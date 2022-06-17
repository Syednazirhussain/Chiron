<?php

namespace App\Http\Controllers\Trainer;

use Stripe;
use Config;
use Session;
use Redirect;
use StripeClient;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Rates;
use App\Models\State;
use App\Models\Images;
use App\Models\Message;
use App\Models\Documents;
use App\Models\Countries;
use Illuminate\Http\Request;
use App\Models\TrainingSessions;
use App\Models\PaymentsSetupCreads;
use App\Http\Controllers\Controller;
use App\Models\UserPayments;
use Illuminate\Support\Facades\Auth;
use App\Repositories\UsersRepository;
use App\Repositories\StripeRepository;
use App\Repositories\MessageRepository;
use App\Repositories\TrainerRepository;
use App\Repositories\SessionsRepository;
use App\Repositories\AppointmentRepository;

class HomeController extends Controller
{
    protected $trainerRepository, $sessionsRepository, $stripeRepository,
        $usersRepository, $messageRepository;

    public function __construct(TrainerRepository  $trainerRepo,
                                SessionsRepository $sessionsRepo,
                                StripeRepository   $stripeRepo,
                                UsersRepository    $usersRepo,
                                AppointmentRepository $bookRepo,
                                MessageRepository  $MessageRepo)
    {
        $this->trainerRepository = $trainerRepo;
        $this->sessionsRepository = $sessionsRepo;
        $this->stripeRepository = $stripeRepo;
        $this->usersRepository = $usersRepo;
        $this->appointmentRepository = $bookRepo;
        $this->messageRepository = $MessageRepo;
    }

    public function getStripeAccount( $account_id = 0 )
    {

    }

    public function cancel_appointment ($id, Request $request) {

        $trainingSession = TrainingSessions::find($id);

        if (empty($trainingSession)) {

            $response = [
                "status"    => "fail",
                "code"      => 404,
                "message"   => "Training session not found",
            ];

            return response()->json($response);
        }

        $concat_date_time = $trainingSession->date." ".$trainingSession->start_time;
        $appointmentTime = Carbon::createFromFormat('Y-m-d h:i A', $concat_date_time, config('app.timezone'));
        $hours = Carbon::now()->timezone(config('app.timezone'))->diffInHours($appointmentTime);

        if ($hours < 4) {

            // Cannot be able to cancel appointment
            $response = [
                "status"    => "fail",
                "code"      => 404,
                "message"   => "Appointment cannot be cancelled within (".$hours.") remaining hours",
            ];

            return response()->json($response);
        }

        $refund = 0;
        $payment_refund_hours = Carbon::now()->timezone(config('app.timezone'))->diffInHours($trainingSession->created_at);
        if ($payment_refund_hours < 24) {
            // Payment Refund Work
            $refund = $this->stripeRepository->refundByChargeId($id);
            \Log::info($refund);
        }

        if ($refund == 1) {

            $trainingSession->update(['status' => 'cancelled', 'cancelled_by' => auth()->user()->id,'payment_status'=>UserPayments::REFUND ]);

            $response = [
                "status"    => "success",
                "code"      => 200,
                "message"   => "Appointment has been cancelled successfully",
            ];

            return response()->json($response, $response["code"]);
        }

        $response = [
            "status"    => "fail",
            "code"      => 400,
            "message"   => "Appointment already has been cancelled/refunded",
        ];

        return response()->json($response);
    }

    public function setupAccount() {

        //get account informatin if setup on strip
        $account_details = '';
        $external_account = '';
        if( !empty( Auth::user()->stripe_account_id )) {
            $account_details    = $this->stripeRepository->retrieveAccount( Auth::user()->stripe_account_id );
            $external_account   = $this->stripeRepository->retrieveExternaAccount( $account_details);

        }


        //successfully setup accout and record updated agains user
        if( Session::get('account_id') ) {
            $updated = $this->usersRepository->update( 'stripe_account_id', Session::get('account_id') );
            if( $updated ) {
                session()->forget('account_id');
            }
        }

        return view('trainer.setup-account', compact('account_details','external_account') );

    }

    public function setupNewAccount() {
        $account_details    = $this->stripeRepository->retrieveAccount( Auth::user()->stripe_account_id ?? '' );

        if( !empty( $account_details['external_accounts']['data'] ) )
            return Redirect::route('upcoming_session');
        $KEY = Config::get('services.stripe.secret');
        $stripe = Stripe::setApiKey($KEY);
        $account = $stripe->account()->create(['type' => 'express']);
        if( !empty( $account ) && !empty( $account['id'] )) {
            session(['account_id' => $account['id'] ]);
            $account_obj = $stripe->account()->accountLinks()->create([
                'account' => $account['id'],
                'refresh_url' => route('setup_account'),
                'return_url' => route('setup_account').'?success=1',
                'type' => 'account_onboarding',
            ]);

            if( !empty( $account_obj ) && $account_obj['url'] ) {
                return Redirect::to($account_obj['url']);
            }
        }
    }

    public function all_messages()
    {
        $trainer_id = auth()->user()->id;
//        dump($trainer_id);
        $trainee_all_ids = Message::where('send_from', $trainer_id)->pluck('send_to')->toArray();
        $trainee_ids = array_unique($trainee_all_ids);
        $users = User::whereIn('id', $trainee_ids)->get();
        return view('trainer.all-messages', compact('users'));
    }

    public function index()
    
    {

        $response = $this->trainerRepository->gettrainerDashboardData();
        $upcomingSessions = $response['upcomingSessions'];
        $previousSessions = $response['previousSessions'];
        $totalEarnings = $response['totalEarnings'];
        return view('trainer.index', compact(['upcomingSessions', 'previousSessions', 'totalEarnings']));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function trainees()
    {
        $trainees = $this->trainerRepository->getMyTrainees();
        return view('trainer.trainees', compact(['trainees']));
    }


    public function traineeSearch(Request $request)
    {
        $trainees = $this->trainerRepository->traineeSearch($request);
        return view('trainer.trainees', compact(['trainees']));
    }


    public function upcomingSession()
    {
        $userType = 'trainer';
        $upcomingSessions = $this->sessionsRepository->getUpcomingSessions($userType);
        return view('trainer.upcomingSession', compact(['upcomingSessions']));
    }

    public function previousSession()
    {
        $previousSessions = $this->sessionsRepository->getPreviousSessions('trainer');
        $totalEarnings = $this->sessionsRepository->getPreviousSessionsTotalEarning();
        return view('trainer.previousSession', compact(['previousSessions','totalEarnings']));
    }

    public function earnings()
    {
        $totalEarnings = $this->sessionsRepository->getTrainerEarnings();
        return view('trainer.earnings', compact(['totalEarnings']));
    }

    public function traineemsg(Request $req)
    {
        $sendTo = $req->id;
        $userInfo = $this->usersRepository->getUserbyId($sendTo);
        $messages = $this->messageRepository->RequestMessagesById($sendTo);
        return view('trainer.traineechat', compact('userInfo', 'messages'));
    }

    public function message($trainee_id) {

        $userInfo = $this->usersRepository->getUserbyId($trainee_id);
        $messages = $this->messageRepository->RequestMessagesById($trainee_id);

        $trainer_id = auth()->user()->id;

        return view('trainer.message', compact('userInfo', 'messages', 'trainee_id', 'trainer_id'));
    }

    public function stripeSetup()
    {
        $data = PaymentsSetupCreads::where('user_id', Auth::user()->id)->where('user_type', 'trainer')->first();
        return view('trainer.paymentinfo', compact(['data']));
    }

    public function saveStripeKey(Request $request)
    {
        $request->validate([
            'stripe_key' => 'required|min:32',
        ]);
        $input = $request->all();
        $input['user_type'] = 'trainer';
        $data = $this->stripeRepository->saveStripeApiKey($input);
        return redirect()->route('stripeSetup');
    }

    public function documentDelete ($id, Request $request) {

        $response = $this->trainerRepository->removeDoc($id);
        return response()->json($response, $response["code"]);
    }

    public function imageDelete ($id, Request $request) {

        $response = $this->trainerRepository->removeImg($id);
        return response()->json($response, $response["code"]);
    }

    public function profile() {

        $profile = $this->trainerRepository->getProfile();
        if (isset($profile->getAddress->country_id)) {
            $rates = Rates::where('location', $profile->getAddress->country_id)
                ->where('user_type', 'for_trainer')
                ->orderBy('id', 'desc')
                ->first();
                $rates_for_admin = Rates::where('location', $profile->getAddress->country_id)
                ->where('user_type', 'for_admin')
                ->orderBy('id', 'desc')
                ->first();

                

        } else {
            $rates = [];
            $rates_for_admin=[];
        }
        $times = $this->trainerRepository->times();
        $countries = Countries::pluck('name', 'id');
        $states = State::select('id', 'name', 'country_id')->get();
        $reviews = $this->trainerRepository->getReviews(Auth::user()->id);
        $documents = $profile->getDocuments()->where('status',1)->get();
        $images = $profile->getImages()->get();
        return view('trainer.profile', compact(['documents','profile', 'countries', 'times', 'rates', 'rates_for_admin' ,'states', 'reviews','images']));
    }

    public function trainerAcceptSession(Request $request) {

        $input = $request->all();
        $responce = $this->sessionsRepository->trainerAcceptSession($input);
        return response()->json($responce);
    }

    public function editCaption($id, Request $request) {

        $document = Documents::find($id);
        if (empty($document)) {

            return [
                "status" => "fail",
                "code" => 404,
                "message" => "Document not found"
            ];
        }


        $document->update([ "document_type" => $request->get("caption") ]);

        return [
            "status" => "success",
            "code" => 200,
            "message" => "Document caption updated successfully."
        ];
    }

    public function documentUpload (Request $request) {

        $input = $request->all();
        $response = $this->trainerRepository->uploadDocuments($input);
        return response()->json($response);
    }

    public function profileUpdate(Request $request)
    {
        $input = $request->all();
        $response = $this->trainerRepository->profileUpdate($input);
        return response()->json($response);
    }

    public function profileImageUpdate(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $trainer = $this->trainerRepository->profileImageUpdate($request->all(), 'trainer');
        return $trainer;
    }

    public function coverImageUpdate(Request $request) {

        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $trainer = $this->trainerRepository->coverImageUpdate($request->all());
        return $trainer;
    }

    public function passwordUpdate(Request $request) {

        $trainee = $this->trainerRepository->passwordUpdate($request->all());
        return response()->json($trainee, $trainee['code']);
    }


    public function removeTrainerImages(Request $request)
    {
        $user_id = $request->user_id;
        $user_source = $request->user_source;

        Images::where('user_id', $user_id)
            ->where('source', $user_source)
            ->delete();
        return response()->json('Photo Removed Sucessfully');

    }

    public function rescheduleAppointment(Request $request)
    {
        $trainer = auth()->user();
        $trainer_id = $trainer->id;
        $trainee_id = $request->traineeid;
        $trainee = User::find($trainee_id);
        $session_id = $request->session_id;
        $view = view("trainer.reschedule-appointment", compact('trainer','trainee','trainer_id','trainee_id','session_id'))->render();
        return  response()->json([ 'html' => $view, 'success' => true ]);
    }

    public function getSessionTimings(Request $request)
    {
        $trainer = $this->trainerRepository->getSessionTimings($request->all());
        return $trainer;
    }

    public function bookAppointment(Request $request) {

        $input = $request->all();
        if ($input['start_time'] != '00') {

            $book = $this->appointmentRepository->bookAppointment($input);
            return  response()->json(['success'=>true,'message' => 'Please Select Time Slot!'], 200);
        }

        return  response()->json(['message' => 'Please Select Time Slot!'],400);
    }

}
