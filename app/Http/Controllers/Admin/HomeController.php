<?php

namespace App\Http\Controllers\Admin;

use Mail;
use Route;
use Flash;
use Stripe;
use Config;
use Throwable;
use App\Models\User;
use App\Models\State;
use App\Models\Cities;
use App\Models\Address;
use App\Models\CmsPages;
use App\Models\Countries;
use Illuminate\Http\Request;
use App\Mail\AdminApprovedTrainer;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use App\Repositories\UsersRepository;
use App\Repositories\TransferPayments;
use App\Repositories\TrainerRepository;
use App\Repositories\SessionsRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Setting;
use http\Exception\InvalidArgumentException;
use Illuminate\Contracts\Encryption\DecryptException;

class HomeController extends AppBaseController
{
    private $usersRepository;
    protected $trainerRepository;
    protected $sessionsRepository;
    protected $transfer;

    public function __construct(UsersRepository $usersRepo, SessionsRepository $sessionsRepo, TrainerRepository $trainerRepo, TransferPayments $transfer)
    {
        $this->middleware('auth');
        $this->usersRepository      =   $usersRepo;
        $this->sessionsRepository   =   $sessionsRepo;
        $this->trainerRepository    =   $trainerRepo;
        $this->transfer             =   $transfer;
    }

    public function index(Request $request) {

        $response = $this->usersRepository->getDashboardStats($request->all());
        return view('admin.index', compact(['response']));
    }

    public function dashboard(Request $request) {

        $response = $this->usersRepository->getDashboardStatistics($request->all());
        $allSessions =  $response['sessions'];
        $completed_sessions =  $response['completed_sessions'];
        
        return view('admin.dashboard', compact(['allSessions', 'response', 'completed_sessions']));
    }

    public function updateUserPref(Request $request)
    {

        //    dd($request->input());

        $training_session1 =  $request->input('training_session1') ?? "";
        $training_session2 =  $request->input('training_session2') ?? "";
        $clientlocation =     $request->input('clientlocation') ?? "";
        $myLocation =         $request->input('myLocation') ?? "";
        $trainerId =         $request->input('trainerId') ?? "";

        if ($training_session1 != "" && $training_session2 != "") $training_session = '1 on 1,2 on 1';
        if ($training_session1 == "" && $training_session2 == "") $training_session = '1 on 1';
        if ($training_session1 != "" && $training_session2 == "") $training_session = '1 on 1';
        if ($training_session1 == "" && $training_session2 != "") $training_session = '2 on 1';
        if ($clientlocation != "" && $myLocation != "") $Location = 'myLocation,clientlocation';
        if ($clientlocation == "" && $myLocation == "") $Location = 'myLocation';
        if ($clientlocation != "" && $myLocation == "") $Location = 'clientlocation';
        if ($clientlocation == "" && $myLocation != "") $Location = 'myLocation';

        try {

            Address::where('user_id', $trainerId)->update([
                'location' => $Location,
                'training_session' => $training_session,


            ]);
            return response()->json(['message' => 'updated sucessfully'
                                       
            ],200);
        } catch (Throwable $e) {
            // report($e); 
            
            return response()->json(['message' => $e->getMessage(),
              
],$e->getCode());

            return false;
        }
        // dd($request->training_session);

    }

    public function terms()
    {
        try {
            $title = request()->route('title');
            $terms = CmsPages::where('page_title', $title)->first();
        } catch (Exception $e) {
            throw new InvalidArgumentException($e->getMessage());
        }
        return view('admin.terms', compact(['terms']));
    }

    public function termsUpdate(Request $request)
    {
        try {
            $title = request()->route('title');
            $termspage = CmsPages::updateOrCreate(
                [
                    'page_title' => $title ?? '',
                ],
                [
                    'page_title' => $title,
                    'page_body' => $request->get('terms_body')
                ]
            );
        } catch (\Exception $e) {
            throw new InvalidArgumentException($e->getMessage());
        }
        return redirect()->back();
    }

    public function getSessionsListing()
    {
        $allSessions = $this->sessionsRepository->getSessionsListing(-1, false);
        return view('admin.sessions.allsessions', compact(['allSessions']));
    }

    public function getrates()
    {

        $rates = $this->usersRepository->getRates();
        $countries = Countries::pluck('name', 'id');
        $countryEmptyTrainerRates = Countries::with('Rates')->first();
        return view('admin.rates.index', compact(['rates', 'countries', 'countryEmptyTrainerRates']));
    }

    public function earnings()
    {
        $earnings = $this->usersRepository->getAdminEarnings();
        // dd( $earnings );
        $allSessions = $this->sessionsRepository->getSessionsListing();
        $earnings = $this->usersRepository->adminEarning();
        $response = [
            'earnings' => $earnings
        ];
        return view('admin.earning.index', compact(['allSessions', 'response']));
    }
    public function TrainersPayment()
    {
        $earnings = $this->usersRepository->getAdminEarnings();
        $earning_dates = $this->usersRepository->getDatesOfEarning();
        //  dd( $earning_dates );


        return view('admin.earning.earning', compact(['earnings', 'earning_dates']));
    }

    public function review()
    {
        $reviews = $this->usersRepository->getAllReviews();
        return view('admin.review.index', compact(['reviews']));
    }

    public function adminProfile()
    {

        $profile = $this->usersRepository->getUserbyId(Auth::user()->id);
        $countries = Countries::pluck('name', 'id');
        $states = State::select('id', 'name', 'country_id')->get();
        $cities = Cities::select('id', 'name', 'country_id', 'state_id')->get();

        return view('admin.profile.admin.index', compact(['profile', 'countries', 'states', 'cities']));
    }

    public function adminProfileUpdate(Request $request)
    {
        $req = $request->all();
        $user = $this->usersRepository->profileUpdate($req);
        return redirect()->back();
    }

    public function traineeProfile(Request $request)
    {
        $profile = $this->sessionsRepository->getTraineeProfile($request->id);
        return view('admin.traineeProfile', compact(['profile']));
    }

    public function setTerainerRates(Request $request)
    {
        $validatedData = $request->validate([
            'location' => ['required'],
            'for_trainer.*' => ['required'],
            'for_admin.*' => ['required'],
        ]);
        //    dd($validatedData);
        return $this->usersRepository->setTerainerRates($validatedData);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function deleteRates(Request $request)
    {
        $input = $request->all();
        return $this->usersRepository->deleteRates($input);
        return back()->with('success', 'Success.');
    }

    public function passwordUpdate(Request $request)
    {
        $response = $this->trainerRepository->passwordUpdate($request->all());
        return response()->json($response, $response['code']);
    }

    public function profileImageUpdate(Request $request)
    {
        request()->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $responce = $this->trainerRepository->profileImageUpdate($request->all(), 'admin');
        return $responce;
    }

    public function approvedTrainer(Request $request)
    {

        if ($request->has("trainer_id") && !empty($request->get("trainer_id"))) {

            $user = User::updateOrCreate(
                ['id' => $request->get("trainer_id")],
                [
                    'approved'  => $request->get("approved"),
                    'status'    => $request->get("status")
                ]
            );

            if ($request->get("approved") == 1) {

                Mail::to($user->email)->send(new AdminApprovedTrainer($user));
                return redirect()->back()->with('success', $user->name . '  Active successfully.');
            }

            return redirect()->back()->with('success', $user->name . '  De-active successfully.');
        } else {
            return redirect()->back()->with('error', 'Something went wrong.');
        }

        return redirect()->route('usersListing');
    }

    public function approveReview(Request $request)
    {
        $input['id'] = $request->id;
        $input['status'] = 'approved';
        $responce = $this->trainerRepository->reviewApprovedDisapprove($input);
        if ($responce == 1) {
            return back()->with('success', 'Successfully Approved');
        } else {
            return back()->with('error', 'Something went wrong.');
        }
    }

    public function removeReview(Request $request)
    {
        $input['id'] = $request->id;
        $input['status'] = 'cancelled';
        $responce = $this->trainerRepository->reviewApprovedDisapprove($input);
        if ($responce == 1) {
            return back()->with('success', 'Successfully Approved');
        } else {
            return back()->with('error', 'Something went wrong.');
        }
    }

    public function getTrainerSessions($id = 0)
    {
        $allSessions    =   $this->sessionsRepository->getPreviousSessions('trainer', $id);
        $wkly           =   $this->sessionsRepository->getSessionWeeklyToPaid($id, 0);
        if( !empty($wkly) ) {
            $amount = 0;
            $amount = $this->sumAmount($wkly);
        }


        return view('admin.sessions.trainer-sessions', compact('allSessions', 'id', 'amount'));
    }

    public function sumAmount($data)
    {
        $sum = 0;
        foreach ($data as $pay) {
            if (!empty($pay->userPayments->amount))
                $sum += trainer_earning($pay->userPayments);
        }
        return $sum;
    }

    public function makePayment(Request $request)
    {
        $trainer_id = Crypt::decryptString($request->trainer_id);
        $amount     = Crypt::decryptString($request->amount);
        $charge_id  = Crypt::decryptString($request->charge_id);
        $user       = $this->usersRepository->getUserbyId($trainer_id);
        $session_id = $request->session_id;

        $KEY        = Config::get('services.stripe.secret');
        $stripe     = Stripe::setApiKey($KEY);

        try {
            $transfer =  $stripe->transfers()->create([
                'amount'                =>  2,
                'currency'              =>  'USD',
                "source_transaction"    =>  null,
                'destination'           =>  $user->stripe_account_id,
                'metadata' => []
            ]);

            if (!empty($transfer)) {
                $this->sessionsRepository->updateSessionPayStatus($session_id, $transfer, 'paid');
                $request->transfer = $transfer;
                $request->session_id = $session_id;
                $request->trainer_id = $user->id;
                $this->transfer->addTransferredPayment($request);
            }


            $response = [
                'status'    => 'success',
                'transfer'  => $transfer,
                'code'      => 200,
                'message'   => 'Payment transferred successfully.',
            ];
        } catch (\Throwable $e) {
            $response = [
                'status' => 'error',
                'code' => 404,
                'message' => $e->getMessage(),
            ];
        }

        return $response;
    }

    public function makeAllPayments(Request $request)
    {
        $response = [];
        $res = 0;
        $amount         = 0;
        $trainer_id     = Crypt::decryptString($request->trainer_id);

        $user           = $this->usersRepository->getUserbyId($trainer_id);
        $KEY            = Config::get('services.stripe.secret');
        $stripe         = Stripe::setApiKey($KEY);

        $wkly   =   $this->sessionsRepository->getSessionWeeklyToPaid($user->id, 7);
        if( !empty($wkly) ) {
            echo $amount = $this->sumAmount($wkly);
        }


            try {
                $transfer =  $stripe->transfers()->create([
                    'amount'                =>  $amount,
                    'currency'              =>  'USD',
                    "source_transaction"    =>  null,
                    'destination'           =>  $user->stripe_account_id,
                    'metadata' => [
                        // 'session_ids'=> implode(',',$request->sessions_ids)
                    ]
                ]);



                if (!empty($transfer)) {
                    $res = $this->sessionsRepository->updateSessionPayStatus($user->id, $transfer, 'paid');
                    $request->transfer      = $transfer;
                    $request->session_id    = $res ?? 0;
                    $request->trainer_id    = $user->id;
                    $this->transfer->addTransferredPayment($request);
                }

                
                $response = [
                    'status'    => 'success',
                    'session_id' => $res,
                    'transfer'  => $transfer,
                    'code'      => 200,
                    'message'   => 'Payment transferred successfully.',
                ];
            
            } catch (\Throwable $e) {
                $response = [
                    'status' => 'error',
                    'code' => 404,
                    'message' => $e->getMessage(),
                ];
            }
     
            return redirect()->back()->with(['msg' => 'Payment transferred successfully.']);
    }

    public function transferPayment(Request $request)
    {
        $this->transfer->addTransferredPayment($request);
    }

    public function transferHistory($criteria = '')
    {
        $per_page = 10;
        $history = $this->transfer->getTransferHistory($criteria, $per_page);
        return view('admin.sessions.transfer-history', compact('history', 'criteria'));
    }

    public function settings(){
                
       $setting = Setting::first();
        if(empty($setting)) {
           
            $setting=['sales_tax'=>13,'extra_charge'=>0.3, 'stripe_fee'=>2.7,'id'=>0];
           
            // Setting::updateOrCreate(['id'=>0],
            // [
            //     'sales_tax' => 13,
            //     'extra_charge' => 0.3,
            //     'stripe_fee' => 2.7

            // ]);
        } 
       return  view('admin.settings',compact('setting'));
    }
    public function settingsUpdate(Request $request){
        $validated = $request->validate([
            'sales_tax' => 'required|numeric|min:0',
            'extra_charge' => 'required|numeric|min:0',
            'stripe_fee' => 'required|numeric|min:0',
        ]);         


        try {
            Setting::updateOrCreate(['id'=>$request->id],
                [
                    'sales_tax' => $request->sales_tax,
                    'extra_charge' => $request->extra_charge,
                    'stripe_fee' => $request->stripe_fee
    
                ]);
            
            return   [
                'status'    => 'success',
                'code'      => 200,
                'message'   => 'setting updated successfully.',
            ];

        }
        catch (\Throwable $e) {
            return  [
                'status' => 'error',
                'code' => 404,
                'message' => $e->getMessage(),
            ];
        }
     }
}
