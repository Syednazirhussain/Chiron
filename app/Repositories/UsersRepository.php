<?php

namespace App\Repositories;

use DB;
use Mail;
use Session;
use Storage;
use Redirect;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Rates;
use App\Models\Images;
use App\Models\Review;
use App\Models\Address;
use App\Models\Documents;
use Illuminate\Support\Str;
use App\Models\UserPayments;
use App\Models\TrainingSessions;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Mail\TrainerSignUpConfirmation;
use App\Mail\TraineeSignUpConfirmation;
use App\Models\Countries;
use App\Repositories\SessionsRepository;
use Illuminate\Contracts\Session\Session as SessionSession;

/**
 * Class UsersRepository
 * @package App\Repositories
 * @version October 7, 2021, 4:28 pm UTC
 */
class UsersRepository extends BaseRepository
{
    protected $session_repository;
    public function __construct( SessionsRepository  $session_repo)
    {
        $this->session_repository = $session_repo;
    }
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'remember_token',
        'dob',
        'role_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return User::class;
    }

    public function registerAttempt($input, $from)
    {
        DB::beginTransaction();
        

        if ($from == 'trainer') {

            try {

                if($input['country']){
                   $country="";
                   $countries= Countries::where('id', $input['country'])->pluck('name')->toArray();
                   $country= $countries[0]? $countries[0] :''; 
                   
                }

                $confirmation_code = Str::random(60);
                
                $user = new User();
                $user->email = $input['email'] ?? '';
                $user->password = Hash::make($input['password']);
                $user->name = $input['fullname'] ?? '';
                $user->confirmation_code = $confirmation_code;
                $user->dob = $input['Dob'] ?? '';
                $user->experience = $input['exp'] ?? '';
                $user->role_id = 2;

                if ($user->save()) {

                    $address = new Address();
                    $address->user_id = $user->id ?? '';
                    $address->address = $input['Address'] ? $input['Address'] : $country;
                    $address->country_id = $input['country'] ?? '';
                    $address->state_id = $input['state'] ?? '';
                    $address->postal_code = $input['PostalCode'] ?? '';

                    $availableLocations = [];
                    if (array_key_exists("location", $input)) {
                        if ($input["location"] == "on") {
                            array_push($availableLocations, "myLocation");
                        }
                    }

                    if (array_key_exists("location1", $input)) {
                        if ($input["location1"] == "on") {
                            array_push($availableLocations, "clientlocation");
                        }
                    }

                    if (!empty($availableLocations)) {
                        $address->location = implode(",", $availableLocations);
                    }

                    $training_sessions = [];
                    if (array_key_exists("training_session", $input)) {
                        if ($input["training_session"] == "on") {
                            array_push($training_sessions, "1 on 1");
                        }
                    }

                    if (array_key_exists("training_session1", $input)) {
                        if ($input["training_session1"] == "on") {
                            array_push($training_sessions, "2 on 1");
                        }
                    }

                    if (!empty($input)) {
                        $address->training_session = implode(",", $training_sessions);
                    }

                    $address->save();
                    
                    $utility_bill_file = $input['utility_bill'];
                    $govt_identification_file = $input['govt_identification'];
                    $cpr_training_certificate_file = $input['cpr_training_certificate'];
                    $personal_training_certificate_file = $input['personal_training_certificate'];
                    
                    $utility_bill_path = Storage::disk('public')->putFile(config('constants.TRAINER_DOCS'), $utility_bill_file);
                    Documents::updateOrCreate(
                        [
                            'user_type'     => "trainer",
                            'source_type'   => "document",
                            'document_type' => $utility_bill_file->getClientOriginalName(),
                            'user_id'       => $user->id,
                            'source'        => $utility_bill_path 
                        ],
                    );

                    $govt_identification_path = Storage::disk('public')->putFile(config('constants.TRAINER_DOCS'), $govt_identification_file);
                    Documents::updateOrCreate(
                        [
                            'user_type'     => "trainer",
                            'source_type'   => "document",
                            'document_type' => $govt_identification_file->getClientOriginalName(),
                            'user_id'       => $user->id,
                            'source'        => $govt_identification_path 
                        ],
                    );

                    $cpr_training_certificate_path = Storage::disk('public')->putFile(config('constants.TRAINER_DOCS'), $cpr_training_certificate_file);
                    Documents::updateOrCreate(
                        [
                            'user_type'     => "trainer",
                            'source_type'   => "document",
                            'document_type' => $cpr_training_certificate_file->getClientOriginalName(),
                            'user_id'       => $user->id,
                            'source'        => $cpr_training_certificate_path 
                        ],
                    );

                    $personal_training_certificate_path = Storage::disk('public')->putFile(config('constants.TRAINER_DOCS'), $personal_training_certificate_file);
                    Documents::updateOrCreate(
                        [
                            'user_type'     => "trainer",
                            'source_type'   => "document",
                            'document_type' => $personal_training_certificate_file->getClientOriginalName(),
                            'user_id'       => $user->id,
                            'source'        => $personal_training_certificate_path 
                        ],
                    );
    
                    /*
                    $files = [];
                    $path = public_path('assets/trainer/documents');

                    if ($input['personal_training_certificate']) {
                        $fileName = \Str::slug(time() .$input['personal_training_certificate']->getClientOriginalName()). '.' . $input['personal_training_certificate']->getClientOriginalExtension();
                        if ($input['personal_training_certificate']->move($path, $fileName)) {
                            $ext = $input['personal_training_certificate']->getClientOriginalExtension();
                            $document = new Documents();
                            $document->user_id = $user->id ?? '';
                            $document->user_type = 'trainer';
                            $document->source = $fileName ?? '';
                            $document->source_type = $ext ?? '';
                            $document->document_type = 'Training';
                            $document->save();
                        }
                    }

                    if ($input['cpr_training_certificate']) {
                        $fileName = \Str::slug(time() .$input['cpr_training_certificate']->getClientOriginalName()). '.' . $input['cpr_training_certificate']->getClientOriginalExtension();
                        if ($input['cpr_training_certificate']->move($path, $fileName)) {
                            $ext = $input['cpr_training_certificate']->getClientOriginalExtension();
                            $document = new Documents();
                            $document->user_id = $user->id ?? '';
                            $document->user_type = 'trainer';
                            $document->source = $fileName ?? '';
                            $document->source_type = $ext ?? '';
                            $document->document_type = 'CPR';
                            $document->save();
                        }
                    }

                    if ($input['govt_identification']) {
                        $fileName = \Str::slug(time() .$input['govt_identification']->getClientOriginalName()). '.' . $input['govt_identification']->getClientOriginalExtension();
                        if ($input['govt_identification']->move($path, $fileName)) {
                            $ext = $input['govt_identification']->getClientOriginalExtension();
                            $document = new Documents();
                            $document->user_id = $user->id ?? '';
                            $document->user_type = 'trainer';
                            $document->source = $fileName ?? '';
                            $document->source_type = $ext ?? '';
                            $document->document_type = 'ID';
                            $document->save();
                        }
                    }

                    if ($input['utility_bill']) {
                        $fileName = \Str::slug(time() .$input['utility_bill']->getClientOriginalName()). '.' . $input['utility_bill']->getClientOriginalExtension();
                        if ($input['utility_bill']->move($path, $fileName)) {
                            $ext = $input['utility_bill']->getClientOriginalExtension();
                            $document = new Documents();
                            $document->user_id = $user->id ?? '';
                            $document->user_type = 'trainer';
                            $document->source = $fileName ?? '';
                            $document->source_type = $ext ?? '';
                            $document->document_type = 'Utility';
                            $document->save();
                        }
                    }
                    */

                    // if (config('mail.username')) {
                    //     if (empty($confirmation_code)) {
                    //         return [
                    //             "status"    => "error",
                    //             "code"      => 500,
                    //             "url"       => route('showTrainerSignupForm'),
                    //         ];
                    //     }
                    //     Mail::to($input['email'])->send(new TrainerSignUpConfirmation($confirmation_code));
                    // }
                    
                    // dd($confirmation_code);
                    
                    // $confirmation_code = User::get_quickRandom(60);
                    Mail::to($input['email'])->send(new TrainerSignUpConfirmation($confirmation_code));

                    
                    DB::commit();
                    
                    return [
                        'status' => 'success',
                        'code'   => 200,
                        'url'    => route('authStatus'),
                    ];
                }
            } catch (Exception $ex) {

                DB::rollback();
                return [
                    'status'    => 'fail',
                    'code'      => 400,
                    'message'   => 'Something went wrong.'
                ];
            }
        } elseif ($from == 'trainee') {

            try {

                $confirmation_code = User::get_quickRandom(60);
                $user = new User();
                $user->email = $input['email'] ?? '';
                $user->password = Hash::make($input['password']);
                $user->name = $input['fullname'] ?? '';
                $user->dob = $input['Dob'] ?? '';
                $user->confirmation_code = $confirmation_code ?? '';
                $user->approved = '0';
                $user->role_id = 3;

                if ($user->save()) {

                    $address = new Address();
                    $address->user_id = $user->id ?? '';
                    $address->address = $input['address'] ?? '';
                    $address->country_id = $input['country'] ?? '';
                    // $address->state_id = $input['state'] ?? '';
                    $address->postal_code = $input['postalCode'] ?? '';

                    if ($address->save()) {

                        if (config('mail.username')) {

                            if (empty($confirmation_code)) {

                                DB::rollback();
                                Session::flash('error', "Something went wrong.");

                                return [
                                    "status"    => "error",
                                    "code"      => 500,
                                    "url"       => route('showTrainerSignupForm'),
                                ];
                            }

                            Mail::to($input['email'])->send(new TraineeSignUpConfirmation($confirmation_code));
                        }

                        DB::commit();
                        Session::flash('success', "Account created successfully.");

                        return [
                            'status'    => 'success',
                            'code'  => 200,
                            'url'   => route('authStatus'),
                        ];
                    }
                }

                DB::rollback();
                Session::flash('error', "Something went wrong.");

                return [
                    'status'    => 'fail',
                    'code'      => 400,
                    'message'   => 'Something went wrong.'
                ];

            } catch (Exception $ex) {

                DB::rollback();
                Session::flash('error', "Something went wrong.");

                return [
                    'status'    => 'fail',
                    'code'      => 400,
                    'message'   => $ex->getMessage()
                ];
            }
        }
    }


    public function loginAttempt($request, $credentials)
    {
        $msg = 'Please verify your email';
        if (Auth::attempt($credentials)) {

            if (Auth::user()->status == 'cancelled') {
                $request->session()->flush();
                $msg = 'Your Account is De-activated';
            }

            if (Auth::user()->email_verified_at == NULL) {
                $request->session()->flush();
                return [
                    'status' => 'error',
                    'code' => 404,
                    'message' => 'Please verify your email address'
                ];
            }

            if (Auth::user()->status == 'approved') {

                $request->session()->regenerate();
                $role_id = Auth::user()->role_id;

                if ($role_id == 2) {
                    $route = route('trainer_index');
                } elseif ($role_id == 3) {
                    $route = route('trainer');
                } elseif ($role_id == 1) {
                    $route = route('home');
                }

                $response = [
                    'status' => 'success',
                    'code' => 200,
                    'url' => $route,
                    'message' => "You are successfully loggedin."
                ];

                return $response;
            } else if (Auth::user()->status == 'pending') {

                $request->session()->flush();

                Auth::logout();

                return [
                    'status'    => 'error',
                    'code'      => 401,
                    'message'   => "Admin not approved your account yet."
                ];
            } else {

                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return [
                    'status'    => 'error',
                    'code'      => 404,
                    'message'   => $msg
                ];
            }
        }

        return [
            'status' => 'error',
            'code' => 404,
            'message' => 'The provided credentials do not match our records.'
        ];
    }

    public function getUsersListing($page = 1)
    {
        return User::with(['role', 'getAddress'])->orderBy('id', 'DESC')->get();
    }

    public function adminEarning()
    {
        $earnings =  UserPayments::where('payment_status',UserPayments::PAID)->sum('adminFeeTax');
        $earnings += UserPayments::where('payment_status',UserPayments::PAID)->sum('adminFee');
        return $earnings;
    }
    
    public function getDashboardStatistics($input)
    {
        $trainers =  User::where('status','approved')->where('role_id', 2)->count();
        $trainees =  User::where('status','approved')->where('role_id', 3)->count();
        $earnings = $this->adminEarning();
        $limit = 5;
        $sessions = $this->session_repository->getSessionsListing($limit, false);
        $completed_sessions = $this->session_repository->getSessionsListing($limit);

        $confirmed_sessions = TrainingSessions::whereIn("status", ["confirmed", "completed"])
                                            ->where("payment_status", "Paid")
                                            ->count();
                                            
        $data = [
            'trainees' => $trainees,
            'trainers' => $trainers,
            'earnings'=> $earnings,
            'confirmed_sessions'=> $confirmed_sessions,
            'total_sessions'=> $sessions->total(),
            'sessions'=> $sessions,
            'completed_sessions'=> $completed_sessions,
        ];
        // dd($data);
        return $data;

    }
    public function getDashboardStats($input)
    {
        $trainers = User::where('role_id', 2)
            // ->where('email_verified_at','!=', NULL)
            ->where('status', 'approved')
            ->count();
        $trainees = User::where('role_id', 3)
            // ->where('email_verified_at','!=', NULL)
            ->where('status', 'approved')
            ->count();

        $earnings = $this->adminEarning();

        if (isset($input['weekly'])) {
            # code...
        } else {
            $today = Carbon::now();
            $previous7Days = Carbon::now()->subDays(7)->format('Y-m-d');
        }
        if (isset($input['monthly'])) {
            # code...
        } else {
            $today = Carbon::now();
            $previous30Days = Carbon::now()->subDays(30)->format('Y-m-d');
        }

        if (isset($input['year'])) {
            # code...
        } else {
            $today = Carbon::now();
            $previous365Days = Carbon::now()->subDays(365)->format('Y-m-d');
        }
        $weekStart = Carbon::now()->subDays(7)->format('Y-m-d');
        $weekEnd = Carbon::now()->format('Y-m-d');
        $startOfMonth = Carbon::now()->startOfMonth()->format('Y-m-d');
        $endOfMonth = Carbon::now()->endOfMonth()->format('Y-m-d');
        $current_month = Carbon::now()->getTranslatedMonthName();

        $amount =  "SUM(user_payments.amount)  as fee";

        $lastWeekSessions = TrainingSessions::join('user_payments', 'user_payments.id', 'training_sessions.payment_id')
            // ->where('training_sessions.trainer_id', Auth::user()->id)
            ->where('training_sessions.status', '!=', 'pending')
            ->where('training_sessions.status', '!=', 'cancelled')
            ->where('training_sessions.status', '!=', 'decline')
            ->whereBetween('user_payments.created_at', [$previous7Days, $today])
            ->select(
                DB::raw("COUNT(training_sessions.id) as total_session"),
                DB::raw($amount),
                DB::raw("SUM(user_payments.tax_amount) as fee_tax"),
                DB::raw("SUM(user_payments.adminFee) as admin_fee"),
                DB::raw("SUM(user_payments.adminFeeTax) as adminfee_Tax"),
                DB::raw("SUM(user_payments.pro_rate_billing) as pro_rate_billing"),
                DB::raw("SUM(user_payments.stripe_charges) as billing_cost")
            )
            ->first();
            // dd($lastWeekSessions->toArray());
        $lastMonthSessions = TrainingSessions::join('user_payments', 'user_payments.id', 'training_sessions.payment_id')
            // ->where('training_sessions.trainer_id', Auth::user()->id)
            ->where('training_sessions.status', '!=', 'pending')
            ->where('training_sessions.status', '!=', 'cancelled')
            ->where('training_sessions.status', '!=', 'decline')
            ->whereBetween('user_payments.created_at', [$previous30Days, $today])
            // ->whereDate('user_payments.created_at','<=', $startOfMonth)
            // ->whereDate('user_payments.created_at','>=', $endOfMonth)
            ->select(
                DB::raw("COUNT(training_sessions.id) as total_session"),
                DB::raw("SUM(user_payments.amount) as fee"),
                DB::raw("SUM(user_payments.tax_amount) as fee_tax"),
                DB::raw("SUM(user_payments.adminFee) as admin_fee"),
                DB::raw("SUM(user_payments.adminFeeTax) as adminfee_Tax"),
                DB::raw("SUM(user_payments.stripe_charges) as billing_cost")
            )
            ->first();
        $lastYearSessions = TrainingSessions::join('user_payments', 'user_payments.id', 'training_sessions.payment_id')
            // ->where('training_sessions.trainer_id', Auth::user()->id)
            ->where('training_sessions.status', '!=', 'pending')
            ->where('training_sessions.status', '!=', 'cancelled')
            ->where('training_sessions.status', '!=', 'decline')
            ->whereBetween('user_payments.created_at', [$previous365Days, $today])
            ->select(
                DB::raw("COUNT(training_sessions.id) as total_session"),
                DB::raw("SUM(user_payments.amount) as fee"),
                DB::raw("SUM(user_payments.tax_amount) as fee_tax"),
                DB::raw("SUM(user_payments.adminFee) as admin_fee"),
                DB::raw("SUM(user_payments.adminFeeTax) as adminfee_Tax"),
                DB::raw("SUM(user_payments.stripe_charges) as billing_cost")
            )
            ->first();
//        dd($lastYearSessions);
        $sessions = TrainingSessions::count();
        $data = [
            'trainees' => $trainees,
            'trainers' => $trainers,
            'lastWeekSessions' => $lastWeekSessions,
            'lastMonthSessions' => $lastMonthSessions,
            'lastYearSessions' => $lastYearSessions,
            'weekStart' => $weekStart,
            'weekEnd' => $weekEnd,
            'current_month' => $current_month,
            'start_day_of_month' => $startOfMonth,
            'end_day_of_month' => $endOfMonth,
            'earnings'=> $earnings
        ];
        return $data;
    }

    public function getUserbyId($u_id)
    {
        return User::where('id', $u_id)
            ->with([
                'getAddress',
                'getDocuments',
                'getAddress.getCountry',
                'getAddress.getState',
                'getAddress.getCity',
                'getProfile',
                'getImages'
            ])->first();
    }

    public function getRates()
    {
//        return Rates::leftjoin('countries', 'countries.id', '=', 'charges.location')
//            ->select('charges.*', 'countries.name as location')
//            ->orderby('charges.id', 'desc')
//            ->get();

        return Rates::with('countries')->get();
    }

    public function setTerainerRates($input)
    {

        foreach (['for_trainer','for_admin'] as $type) {
            Rates::updateOrCreate([
                'location'   => $input['location'],
                'user_type'   => $type,
            ],[
                'one_on_1_training_charge' => $input[$type]['101'] ?? '',
                'one_on_1_training_charge_sales_tax' => $input[$type]['101'] * 0.13,
                'two_on_1_training_charge' => $input[$type]['201'] ?? '',
                'two_on_1_training_charge_sales_tax' => $input[$type]['201'] * 0.13,
                'location' => $input['location'],
                'user_type' => $type,
            ]);
        }

        $response = [
            'status' => 'success',
            'code' => 200,
            'message' => 'New Location updated successfully.'
        ];
        return response()->json($response);

    }

    public function profileUpdate($input)
    {
        DB::beginTransaction();
        try {
            if (isset($input['type']) && $input['type'] == 'admin') {
                $user = User::find(Auth::user()->id);
                $user->name = $input['name'] ?? '';
                $user->phone = $input['phone'] ?? '';
                $user->c_name = $input['c_name'] ?? '';
                if ($user->save()) {
                    $check = Address::where('user_id', Auth::user()->id)->first();
                    if (!empty($check)) {
                        Address::where('user_id', Auth::user()->id)->update([
                            'country_id' => $input['country'] ?? '',
                            'state_id' => $input['state'] ?? '',
                            'city_id' => $input['city_id'] ?? ''
                        ]);
                    } else {
                        $Address = new Address();
                        $Address->user_id = Auth::user()->id;
                        $Address->country_id = $input['country'] ?? '';
                        $Address->state_id = $input['state'] ?? '';
                        $Address->city_id = $input['city_id'] ?? '';
                        $Address->save();
                    }

                    DB::commit();
                    return 1;
                }
            } else {
                $user = User::find(Auth::user()->id);
                $user->name = $input['name'] ?? '';
                // $user->municipality = $input['municipality'];
                if ($user->save()) {
                    Address::where('user_id', Auth::user()->id)->update([
                        'state_id' => $input['state'] ?? ''
                    ]);

                    Address::where('user_id', Auth::user()->id)->update([
                        'address' => $input['address'] ?? '',
                        'country_id' => $input['country'] ?? ''
                    ]);
                    DB::commit();
                    return true;
                }
            }
        } catch (Exception $ex) {
            DB::rollback();
            $response = [
                'status' => 'fail',
                'code' => 400,
                'message' => 'Something went wrong.'
            ];
            return response()->json($response);
        }
    }

    public function deleteRates($input)
    {
        DB::beginTransaction();
        try {
            if ($input['id'] > 0) {
                if (Rates::where('id', $input['id'])->delete()) {
                    DB::commit();
                    $response = [
                        'status' => 'success',
                        'code' => 200,
                        'message' => 'Successfully Deleted.'
                    ];
                    return response()->json($response);
                } else {
                    DB::rollback();
                    $response = [
                        'status' => 'error',
                        'code' => 400,
                        'message' => 'Something went wrong please try again latter.'
                    ];
                    return response()->json($response);
                }
            } else {
                DB::rollback();
                $response = [
                    'status' => 'error',
                    'code' => 400,
                    'message' => 'Record Not Found.'
                ];
                return response()->json($response);
            }
        } catch (Exception $ex) {
            DB::rollback();
            $response = [
                'status' => 'fail',
                'code' => 400,
                'message' => 'Something went wrong.'
            ];
            return response()->json($response);
        }
    }

    public function getAdminEarnings()
    {
        $today = Carbon::now();

        $weekStart = Carbon::now()->startOfWeek()->format('Y-m-d');
        $weekEnd = Carbon::now()->endOfWeek()->format('Y-m-d');

        $previous7Days = Carbon::now()->subDays(7)->format('Y-m-d');
        $previous30Days = Carbon::now()->year(2022)->startOfMonth();
        $previous365Days = Carbon::now()->startOfYear();


        $remianig = 'SUM(user_payments.amount) + SUM(user_payments.tax_amount) -SUM(user_payments.pro_rate_billing)';
        $pending = '(SUM(user_payments.amount) + SUM(user_payments.tax_amount) -SUM(user_payments.pro_rate_billing)) - SUM(transfer_payments.amount)';
        //    old
        // $amount = 'SUM(user_payments.amount)+SUM(user_payments.tax_amount) -SUM(user_payments.pro_rate_billing) as amount';
        
        // new By Azam
        $amount = 'SUM(user_payments.amount) as amount';
       
        //    old
        // $adminfee = 'SUM(user_payments.adminfee)+SUM(user_payments.adminFeetax) as TotalAdminFees';
        
        // new By Azam
        $adminfee = 'SUM(user_payments.adminfee) as TotalAdminFees';

        $adminfeeTax = 'SUM(user_payments.adminFeetax) as admin_tax';
        $lastWeekSessions = TrainingSessions::join('user_payments', 'user_payments.id', 'training_sessions.payment_id')
        ->join('users', 'users.id', 'training_sessions.trainer_id')
        ->leftjoin('transfer_payments', 'transfer_payments.session_id', 'training_sessions.id')
        ->where('training_sessions.payment_status', UserPayments::PAID)
        ->where('training_sessions.status', 'completed')   //Azam only mark completed should show there
        ->whereBetween('user_payments.created_at', [$weekStart, $weekEnd])
        ->select(
            DB::raw($remianig.' as remaining_amount'),
            DB::raw($pending.' as pendingAmount'),
            DB::raw($amount),
            DB::raw($adminfeeTax),

            DB::raw('SUM(transfer_payments.amount) as amount_paid'),
            DB::raw('SUM(user_payments.tax_amount) as tax_amount'),
            DB::raw('SUM(user_payments.stripe_charges) as stripe_charges'),
            DB::raw('SUM(user_payments.pro_rate_billing) as pro_rate_billing'),
            DB::raw('COUNT(training_sessions.id) as session_conducted'),
            DB::raw($adminfee),'training_sessions.completed_at', 'training_sessions.trainer_id as trainer_id', 'users.id as user_id', 'users.name as user_name', 'users.profile_image', 'user_payments.adminFee')


        // ->addSelect(['pendingAmount' => function ($query) {
        //         $query->select(DB::raw('SUM(user_payments.amount) + SUM(user_payments.tax_amount) -SUM(user_payments.pro_rate_billing)'))
        //             ->join('training_sessions','training_sessions.id','user_payments.session_id')
        //             // ->join('training_sessions','training_sessions.trainer_id','user_payments.trainer_id')
        //         ->from('user_payments')
        //             ->whereRaw('DATEDIFF( training_sessions.activation_date, now() ) <= 0')
        //             ->where('training_sessions.transfer_id',NULL)
        //             // ->groupBy('users.id');
        //             ;
        // }])
        ->groupBy('users.id')
        ->get();
        // dump($lastWeekSessions->toArray()[0]);
        // dd($lastWeekSessions->toArray()[1]);
        $lastMonthSessions = TrainingSessions::join('user_payments', 'user_payments.id', 'training_sessions.payment_id')
            ->join('users', 'users.id', 'training_sessions.trainer_id')
            ->leftjoin('transfer_payments', 'transfer_payments.session_id', 'training_sessions.id')
            ->where('training_sessions.status', '!=', 'pending')
            ->where('training_sessions.status', '!=', 'cancelled')
            ->where('training_sessions.status', '!=', 'decline')
            ->where('training_sessions.status', '=', 'completed')
            ->whereBetween('user_payments.created_at', [$previous30Days, $today])
            ->select(
                DB::raw($remianig.' as remaining_amount'),
                DB::raw($amount),
                DB::raw($adminfeeTax),

                DB::raw('SUM(transfer_payments.amount) as amount_paid'),
                DB::raw('SUM(user_payments.tax_amount) as tax_amount'),
                DB::raw('SUM(user_payments.stripe_charges) as stripe_charges'),
                DB::raw('SUM(user_payments.pro_rate_billing) as pro_rate_billing'),
                DB::raw('COUNT(training_sessions.id) as session_conducted'),
                DB::raw($adminfee), 'users.id as user_id', 'users.name as user_name', 'users.profile_image', 'user_payments.adminFee')
            ->groupBy('users.id')
            ->get();

        $lastYaerSessions = TrainingSessions::join('user_payments', 'user_payments.id', 'training_sessions.payment_id')
            ->join('users', 'users.id', 'training_sessions.trainer_id')
            ->leftjoin('transfer_payments', 'transfer_payments.session_id', 'training_sessions.id')
            ->where('training_sessions.status', '!=', 'pending')
            ->where('training_sessions.status', '!=', 'cancelled')
            ->where('training_sessions.status', '!=', 'decline')
            ->where('training_sessions.status', '=', 'completed')
            ->whereBetween('user_payments.created_at', [$previous365Days, $today])
            ->select(
                DB::raw($remianig.' as remaining_amount'),
                DB::raw($amount),
                DB::raw($adminfeeTax),

                DB::raw('SUM(transfer_payments.amount) as amount_paid'),
                DB::raw('SUM(user_payments.tax_amount) as tax_amount'),
                DB::raw('SUM(user_payments.stripe_charges) as stripe_charges'),
                DB::raw('SUM(user_payments.pro_rate_billing) as pro_rate_billing'),
                DB::raw('COUNT(training_sessions.id) as session_conducted'),
                DB::raw($adminfee), 'users.id as user_id', 'users.name as user_name', 'users.profile_image', 'user_payments.adminFee')
            ->groupBy('users.id')
            ->get();

        $lastWeekAdminFee = TrainingSessions::join('user_payments', 'user_payments.id', 'training_sessions.payment_id')
            ->join('users', 'users.id', 'training_sessions.trainer_id')
            ->where('training_sessions.status', '!=', 'pending')
            ->where('training_sessions.status', '!=', 'cancelled')
            ->where('training_sessions.status', '!=', 'decline')
            ->where('training_sessions.status', '=', 'completed')
            ->whereBetween('user_payments.created_at', [$previous7Days, $today])
            ->select(DB::raw('SUM(user_payments.adminFee) as amount'), 
                DB::raw('SUM(user_payments.pro_rate_billing) as pro_rate_billing'),    
                DB::raw('SUM(user_payments.adminFeeTax) as tax_amount'),
                DB::raw('SUM(user_payments.stripe_charges) as stripe_charges'), DB::raw('COUNT(training_sessions.id) as session_conducted'),
                DB::raw('SUM(user_payments.adminFee) as TotalAdminFees'), 'user_payments.adminFee')
            ->get();
        $lastMonthAdminFee = TrainingSessions::join('user_payments', 'user_payments.id', 'training_sessions.payment_id')
            ->join('users', 'users.id', 'training_sessions.trainer_id')
            ->where('training_sessions.status', '!=', 'pending')
            ->where('training_sessions.status', '!=', 'cancelled')
            ->where('training_sessions.status', '=', 'completed')
            ->where('training_sessions.status', '!=', 'decline')
            ->whereBetween('user_payments.created_at', [$previous30Days, $today])
            ->select(DB::raw('SUM(user_payments.adminFee) as amount'), 
            DB::raw('SUM(user_payments.pro_rate_billing) as pro_rate_billing'),
                DB::raw('SUM(user_payments.adminFeeTax) as tax_amount'),
                DB::raw('SUM(user_payments.stripe_charges) as stripe_charges'), DB::raw('COUNT(training_sessions.id) as session_conducted'),
                DB::raw('SUM(user_payments.adminFee) as TotalAdminFees'), 'user_payments.adminFee')
            ->get();

        $lastYearAdminFee = TrainingSessions::join('user_payments', 'user_payments.id', 'training_sessions.payment_id')
            ->join('users', 'users.id', 'training_sessions.trainer_id')
            ->where('training_sessions.status', '!=', 'pending')
            ->where('training_sessions.status', '!=', 'cancelled')
            ->where('training_sessions.status', '!=', 'decline')
            ->where('training_sessions.status', '=', 'completed')
            ->whereBetween('user_payments.created_at', [$previous365Days, $today])
            ->select(DB::raw('SUM(user_payments.adminFee) as amount'), 
            DB::raw('SUM(user_payments.pro_rate_billing) as pro_rate_billing'),    
            DB::raw('SUM(user_payments.adminFeeTax) as tax_amount'),
                DB::raw('SUM(user_payments.stripe_charges) as stripe_charges'), DB::raw('COUNT(training_sessions.id) as session_conducted'),
                DB::raw('SUM(user_payments.adminFee) as TotalAdminFees'), 'user_payments.adminFee')
            ->get();

        $data = [
            'lastWeekSessions' => $lastWeekSessions,
            'lastMonthSessions' => $lastMonthSessions,
            'lastYearSessions' => $lastYaerSessions,
            'lastWeekAdminFee' => $lastWeekAdminFee,
            'lastMonthAdminFee' => $lastMonthAdminFee,
            'lastYearAdminFee' => $lastYearAdminFee,
        ];
        return $data;
    }
    public function getDatesOfEarning(){

      $weekStart = Carbon::now()->startOfWeek()->format('Y-m-d');
      $weekEnd = Carbon::now()->endOfWeek()->format('Y-m-d');
      $startOfMonth = Carbon::now()->startOfMonth()->format('Y-m-d');
      $endOfMonth = Carbon::now()->endOfMonth()->format('Y-m-d');
      $current_Year = Carbon::now()->format('Y');
        // $last_week=$previous7Days.'-'.$today;
        // $last_month= $previous30Days.'-'.$today;
        // $last_year=$previous365Days.'-'.$today;

        $dates_of_earning=[
                'last_week'=>$weekStart.' - '.$weekEnd,
               'last_month' =>$startOfMonth.' - '.$endOfMonth,
                'last_year'=>$current_Year,

        ];
        return $dates_of_earning;

    }

    public function getAllReviews()
    {
        $review = Review::leftjoin('users', 'users.id', 'reviews.trainer_id')
            ->with([
                'traineeNames',
            ])
            ->select('reviews.*', 'users.name')
            ->orderBy('id', 'desc')->get();
        return $review;
    }

    public function getUserWithRole()
    {
        $data['admin'] = $this->model->where('role_id', '1')->get();
        $data['trainer'] = $this->model->where('role_id', '2')->get();
        $data['trainee'] = $this->model->where('role_id', '3')->get();
        return $data;
    }

    public function update( $key, $value = '')
    {
        if( !empty( $key ) ) {
            $user          =   Auth::user();
            $user->$key    =   $value;
            $user->save();
            return $user;
        }

    }
}
