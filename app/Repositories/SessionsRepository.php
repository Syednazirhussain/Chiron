<?php

namespace App\Repositories;

use DB;
use Mail;
use Carbon\Carbon;
use App\Models\User;
use App\Models\UserPayments;
use App\Models\TrainingSessions;
use App\Mail\TrainerAcceptSession;
use App\Mail\TrainerDeclineSession;
use Illuminate\Support\Facades\Auth;
use App\Repositories\StripeRepository;

/**
 * Class SessionsRepository
 * @package App\Repositories
 * @version November 2, 2021, 12:32 pm UTC
 */
class SessionsRepository
{
    protected $stripeRepository;

    /**
     * @var array
     */

    public function model()
    {
    }

    public function getFieldsSearchable()
    {
    }

    public function __construct(StripeRepository $stripeRepo)
    {
        $this->stripeRepository = $stripeRepo;
    }

    /**
     * Return searchable fields
     *
     * @return array
     */

    public function getSessionsListing($limit =-1,$paid = true)
    {
        $sessions =  TrainingSessions::with(['trainee','trainer']);
        if($paid){
           $sessions->where('payment_status',UserPayments::PAID);
           $sessions->where('status','completed');
        }
        $sessions->orderby('id', 'desc');
        if($limit > 0 ){
            return $sessions->paginate($limit);
        }
        return $sessions->get();
    }

    public function getUpcomingSessions($userType = '')
    {
        if ($userType == 'trainer') {
            $upcomingSessions = TrainingSessions::where('trainer_id', Auth::user()->id)
                ->where('status', '!=', 'completed')->with([
                    'trainee']);
        } elseif ($userType == 'trainee') {
            $upcomingSessions = TrainingSessions::where('trainee_id', Auth::user()->id)
                ->where('status', '!=', 'completed')->with([
                    'trainee',
                    'trainee.getAddress',
                    'trainee.getAddress.getCountry',
                ]);
        }
        $upcomingSessions = $upcomingSessions->orderby('id', 'desc')->get();
        return $upcomingSessions;
    }
    public function getPreviousSessions($userType = '', $id = 0)
    {

        $id = ($id==0)?Auth::user()->id:$id;
        if ($userType == 'trainer') {
            $previousSessions = TrainingSessions::where('trainer_id', $id)
                ->where('status', 'completed')
                ->with([
                    'trainee',
                    'userPayments'
                ]);



        } elseif ($userType == 'trainee') {
            $previousSessions = TrainingSessions::where('trainee_id', $id)
                ->where('status', 'completed')
                ->with([
                    'trainee',
                    'trainee.getAddress',
                    'trainee.getAddress.getCountry',
                    'userPayments',
                    'Reviews'
                ]);
        }
        $previousSessions = $previousSessions->orderby('id', 'desc')->get();
        return $previousSessions;
    }
    public function getPreviousSessionsTotalEarning()
    {
        $totalEarnings = 0;
        $lastWeekSessions = TrainingSessions::join('user_payments', 'user_payments.id', 'training_sessions.payment_id')
        ->where('training_sessions.trainer_id', Auth::user()->id)
        ->where('training_sessions.status', '!=', 'pending')
        ->where('training_sessions.status', '!=', 'cancelled')
        ->where('training_sessions.status', '!=', 'decline')
        ->where('training_sessions.status', '!=', 'confirmed')
        ->select(\DB::raw('SUM(user_payments.amount) + SUM(user_payments.tax_amount) - SUM(user_payments.pro_rate_billing) as totalEarnings'))
        ->first();

        if (!empty($lastWeekSessions)) {
            $totalEarnings = $lastWeekSessions->totalEarnings;
        }
        return $totalEarnings;
    }


    public function getSessionsbyUserID($id)
    {
        return TrainingSessions::where('trainer_id', $id)->with([
            'myTraineesNames',
        ])
            ->orderby('id', 'desc')
            ->get();
    }

    public function trainerAcceptSession($input) {

        DB::beginTransaction();

        try {
            if ($input['type'] == 'accept') {
                $row = $input['accept_row_id'];
            } elseif ($input['type'] == 'decline') {
                $row = $input['reject_row_id'];
            } elseif ($input['type'] == 'cancel') {
                $row = $input['cancel_row_id'];
            } elseif ($input['type'] == 'completed') {
                $row = $input['completed_row_id'];
            }

            $data = TrainingSessions::where('id', $row)->first();

            if (!empty($data)) {

                if ($data->trainer_id == Auth::user()->id && $data->trainee_id == $input['trainee_id']) {

                    if ($input['type'] == 'accept') {

                        $t = TrainingSessions::where('id', $input['accept_row_id'])
                                            ->where('trainer_id', Auth::user()->id)
                                            ->where('trainee_id', $input['trainee_id'])
                                            ->update(['status' => 'confirmed']);

                        $traineeCharge = User::where('id', $input['trainee_id'])->first();

                        if (!empty($traineeCharge)) {

                            if (empty($traineeCharge->customer_stripe_id)) {

                                DB::rollback();
                                return [
                                    'status'    => 'fail',
                                    'code'      => 400,
                                    'message'   => 'No Payment Method set form Trainee',
                                ];
                            }

                            $session = TrainingSessions::where('id', $row)->first();
                            $chargeResponse = $this->stripeRepository->charge($traineeCharge, $session);

                            if ($chargeResponse == 1) {


                                DB::commit();

                                $user = User::where('id', $input['trainee_id'])->first();
                                Mail::to($user->email)->send(new TrainerAcceptSession($user));

                                $data = [
                                    'myName' => 'Thank you ' . Auth::user()->name,
                                    'trainee' => $user->name,
                                ];

                                return [
                                    'status'    => 'success',
                                    'code'      => 200,
                                    'data'      => $data,
                                ];
                            } else if ($chargeResponse == 2) {

                                DB::rollback();
                                return [
                                    'status'    => 'fail',
                                    'code'      => 400,
                                    'message'   => 'No Charges set for Trainee`s Location',
                                ];
                            } else {

                                DB::rollback();
                                return [
                                    'status'    => 'fail',
                                    'code'      => 400,
                                    'message'   => 'Something went wrong',
                                ];
                            }
                        }
                    } elseif ($input['type'] == 'decline') {

                        TrainingSessions::where('id', $input['reject_row_id'])
                                        ->where('trainer_id', Auth::user()->id)
                                        ->where('trainee_id', $input['trainee_id'])
                                        ->update(['status' => 'decline']);

                        $user = User::where('id', $input['trainee_id'])->first();
                        Mail::to($user->email)->send(new TrainerDeclineSession($user));

                    } elseif ($input['type'] == 'cancel') {

                        TrainingSessions::where('id', $input['cancel_row_id'])
                                    ->where('trainer_id', Auth::user()->id)
                                    ->where('trainee_id', $input['trainee_id'])
                                    ->update(['status' => 'cancelled']);

                        $traineeCharge = User::where('id', $input['trainee_id'])->first();

                        if (!empty($traineeCharge)) {

                            $session = TrainingSessions::where('id', $row)->first();
                            $refundResponse = $this->stripeRepository->refund($session);

                            if ($refundResponse != 0) {

                                DB::commit();

                                $user = User::where('id', $input['trainee_id'])->first();

                                $data = [
                                    'myName' => 'Thank you ' . Auth::user()->name,
                                    'trainee' => $user->name,
                                ];

                                return [
                                    'status'    => 'success',
                                    'code'      => 200,
                                    'data'      => $data,
                                ];
                            } else {

                                DB::rollback();
                                return [
                                    'status'    => 'fail',
                                    'code'      => 400,
                                    'message'   => 'Something went wrong',
                                ];
                            }
                        }
                    } elseif ($input['type'] == 'completed') {

                        TrainingSessions::where('id', $input['completed_row_id'])
                                        ->where('trainer_id', Auth::user()->id)
                                        ->where('trainee_id', $input['trainee_id'])
                                        ->update(['status' => 'completed','completed_at'=> Carbon::now(), 'activation_date'=> Carbon::now()->addDays(7) ]);
                    }

                    DB::commit();
                    $user = User::where('id', $input['trainee_id'])->first();

                    $data = [
                        'myName' => 'Thank you ' . Auth::user()->name,
                        'trainee' => $user->name,
                    ];

                    return [
                        'status' => 'success',
                        'code' => 200,
                        'data' => $data,
                    ];

                } else {
                    DB::rollback();
                    $response = [
                        'status' => 'fail',
                        'code' => 400,
                        'message' => 'Something went wrong',
                    ];
                    return response()->json($response);
                }
            } else {

                DB::rollback();

                return [
                    'status' => 'fail',
                    'code' => 400,
                    'message' => 'Something went wrong',
                ];
            }
        } catch (Exception $ex) {

            DB::rollback();

            return [
                'status' => 'fail',
                'code' => 400,
                'message' => 'Something went wrong.',
            ];
        }
    }

    public function getTrainerEarnings()
    {
        try {
            $today = Carbon::now();
            $previous7Days = Carbon::now()->subDays(7)->format('Y-m-d');
            $previous30Days = Carbon::now()->subDays(30)->format('Y-m-d');
            $previous365Days = Carbon::now()->subDays(365)->format('Y-m-d');

            $lastWeekSessions = TrainingSessions::join('user_payments', 'user_payments.id', 'training_sessions.payment_id')
                ->where('training_sessions.trainer_id', Auth::user()->id)
                ->where('training_sessions.status', '=', 'completed')
                ->where('training_sessions.status', '!=', 'pending')
                ->where('training_sessions.status', '!=', 'cancelled')
                ->where('training_sessions.status', '!=', 'decline')
                ->whereBetween('user_payments.created_at', [$previous7Days, $today])
                ->select('training_sessions.date as session_date', 'training_sessions.training_session',
                    'user_payments.amount', 'user_payments.tax_amount as sales_tax', 'user_payments.stripe_charges as billing_fee',
                    'user_payments.receipt_url', 'user_payments.adminFee','user_payments.pro_rate_billing as pro_rate_billing')
                ->get();
//dd(       $lastWeekSessions);
            $lastMonthSessions = TrainingSessions::join('user_payments', 'user_payments.id', 'training_sessions.payment_id')
                ->where('training_sessions.trainer_id', Auth::user()->id)
                ->where('training_sessions.status', '=', 'completed')
                ->where('training_sessions.status', '!=', 'pending')
                ->where('training_sessions.status', '!=', 'cancelled')
                ->where('training_sessions.status', '!=', 'decline')
                ->whereBetween('user_payments.created_at', [$previous30Days, $today])
                ->select('training_sessions.date as session_date', 'training_sessions.training_session', 'user_payments.amount', 'user_payments.tax_amount as sales_tax', 'user_payments.stripe_charges as billing_fee', 'user_payments.receipt_url','user_payments.pro_rate_billing as pro_rate_billing')
                ->get();

            $lastYearSessions = TrainingSessions::join('user_payments', 'user_payments.id', 'training_sessions.payment_id')
                ->where('training_sessions.trainer_id', Auth::user()->id)
                ->where('training_sessions.status', '=', 'completed')
                ->where('training_sessions.status', '!=', 'pending')
                ->where('training_sessions.status', '!=', 'cancelled')
                ->where('training_sessions.status', '!=', 'decline')
                ->whereBetween('user_payments.created_at', [$previous365Days, $today])
                ->select('training_sessions.date as session_date', 'training_sessions.training_session', 'user_payments.amount', 'user_payments.tax_amount as sales_tax', 'user_payments.stripe_charges as billing_fee', 'user_payments.receipt_url','user_payments.pro_rate_billing as pro_rate_billing')
                ->get();

            $data = [
                'lastWeekSessions' => $lastWeekSessions,
                'lastMonthSessions' => $lastMonthSessions,
                'lastYearSessions' => $lastYearSessions,
            ];

            return $data;

        } catch (Exception $ex) {
            $lastWeekSessions = [];
            $lastMonthSessions = [];
            $lastYearSessions = [];
            $data = [
                'lastWeekSessions' => $lastWeekSessions,
                'lastMonthSessions' => $lastMonthSessions,
                'lastYearSessions' => $lastYearSessions,
            ];
            return $data;
        }
    }

    public function getTraineeProfile($id)
    {
        $user = User::where('id', $id)->with([
            'getAddress',
            'getAddress.getCountry',
            'getAddress.getState',
        ])->first();

        $sessions = TrainingSessions::where('training_sessions.trainee_id', $id)
            ->where('training_sessions.status', '!=', 'completed')
            ->where('training_sessions.status', '!=', 'cancelled')
            ->where('training_sessions.status', '!=', 'decline')
            ->get();
        $completedsessions = TrainingSessions::where('training_sessions.trainee_id', $id)
            ->where('training_sessions.status', '!=', 'completed')
            ->count();
        $data = [
            'user' => $user,
            'sessions' => $sessions,
            'completedsessions' => $completedsessions,
        ];
        return $data;
    }

    public function updateSessionPayStatus($id, $transfer, $status)
    {
        // $sql = " DATEDIFF(now(), activation_date ) <= ".$days;
        $sql = " DATEDIFF(activation_date, now() ) <= 0";
        return TrainingSessions::where('trainer_id', $id)->whereRaw($sql)
        ->update(
            ['payment_status'=>$status, 'transfer_id'=>$transfer['id']]
        );
    }

    public function getSessionWeeklyToPaid($id = 0, $days=0)
    {
        
        // $sql = " DATEDIFF(now(), activation_date ) <= ".$days;
        $sql = " DATEDIFF(activation_date, now() ) <= 0";
        return TrainingSessions::where('trainer_id', $id)
            ->whereRaw($sql)
            ->where('status', 'completed')
            ->where('transfer_id',NULL)
            ->with([
                'userPayments'
            ])
            ->orderby('id', 'desc')->get();

    }

    public function getSession($id = 0)
    {
        // return TrainingSessions::find( $id );
        $previousSessions = TrainingSessions::where('id', $id)
                // ->where('status', 'completed')
                ->with([
                    // 'myTraineesNames',
                    'userPayments'
                ])->first();
                return $previousSessions;

    }
}
