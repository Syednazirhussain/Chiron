<?php

namespace App\Repositories;

use DB;
use Mail;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Address;
use App\Models\TrainingSessions;
use Illuminate\Support\Facades\Auth;
use App\Mail\TraineeBookAppointment;
use App\Mail\TrainerAppointmentRescheduled;

/**
* Class AppointmentRepository
* @package App\Repositories
* @version November 24, 2021, 7:15 pm UTC
*/
class AppointmentRepository
{
    public function __construct(StripeRepository $stripeRepo)
    {
        $this->stripeRepository = $stripeRepo;
    }


    public function bookAppointment($input)
    {
        $location = '';
        if (isset($input['preferedLocation'])) {
            if ($input['preferedLocation'] == 'myLocation') {
                $location = Address::where('user_id', $input['trainerId'])->pluck('address')->first();
            } else {
                $location = Address::where('user_id', Auth::user()->id)->pluck('address')->first();
            }
        }
        $user = auth()->user();
        if (!isset($input['session_id'])) {

            if ($input['preferedLocation'] == 'myLocation') {
                $user = User::where('id', $input['trainerId'])->first();
            }

            if ($input['trainingPreference'] == '1 on 1') {
                $final_fees =  get_price_by_location($user,'one_on_1_training_charge',true);
            } else {
                $final_fees =  get_price_by_location($user,'two_on_1_training_charge',true);
            }
        }
       

        DB::beginTransaction();

        try {

            if (isset($input['session_id'])) {

                $trainingSessions = TrainingSessions::where('id',$input['session_id'])
                                                ->with(["trainee", "trainer"])
                                                ->first();
                $trainingSessions->reschedule = '1';
                $trainingSessions->status = 'rescheduled';
            } else {

                $trainingSessions = new TrainingSessions();
                $trainingSessions->payable_amount = $final_fees;
            }

            $trainingSessions->trainer_id = $input['trainerId'];
            $trainingSessions->trainee_id = $input['trainee_id'] ?? Auth::user()->id;
            $trainingSessions->date = $input['selectedDate'];
            $trainingSessions->start_time = $input['start_time'];

            if (isset($input['trainingPreference'])) {

                $trainingSessions->status = 'pending';
                $trainingSessions->training_session = $input['trainingPreference'];
                $trainingSessions->location = $location ?? $input['preferedLocation'];
                $trainingSessions->trainingPreference = $input['preferedLocation'];
            }

            if ($trainingSessions->save()) {
                $this->stripeRepository->chargeWithoutStripe($user, $trainingSessions);
                if (isset($input['session_id'])) {

                    Mail::to($trainingSessions->trainee->email)->send(new TrainerAppointmentRescheduled($trainingSessions));
                } else {

                    $data = [
                        "trainee_name"  => Auth::user()->name,
                        "date"  => Carbon::parse($trainingSessions->date)->format("F d, Y"),
                        "time"  => $trainingSessions->start_time
                    ];

                    $trainer = User::where("id", $input["trainerId"])->first();
                    Mail::to($trainer->email)->send(new TraineeBookAppointment($trainer, $data));
                }

                DB::commit();

                return [
                    'status'    => 'success',
                    'code'      => 200,
                    'message'   => 'Appointment booked successfully.',
                ];
            }

            return [
                'status'    => 'fail',
                'code'      => 400,
                'message'   => 'Something went wrong.'
            ];
        } catch (Exception $ex) {

            DB::rollback();
            return [
                'status'    => 'fail',
                'code'      => 500,
                'message'   => $ex->getMessage(),
            ];
        }
    }
}
