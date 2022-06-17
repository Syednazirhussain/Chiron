<?php

namespace App\Http\Controllers\Trainee;

use Mail;
use Auth;
use Redirect;
use Carbon\Carbon;
use App\Models\User;
use App\Models\State;
use App\Models\Review;
use App\Models\Countries;
use App\Models\TimeSchedule;
use Illuminate\Http\Request;
use App\Models\UserPayments;
use App\Models\TrainingSessions;
use App\Http\Controllers\Controller;
use App\Repositories\UsersRepository;
use App\Repositories\StripeRepository;
use App\Mail\TraineeAppointmentCancel;
use App\Repositories\MessageRepository;
use App\Repositories\TrainerRepository;
use App\Repositories\SessionsRepository;
use App\Repositories\AppointmentRepository;

class HomeController extends Controller
{
    protected
        $trainerRepository, $sessionsRepository, $userRepository,
        $appointmentRepository, $stripeRepository, $messageRepository;

    public function __construct(
        TrainerRepository     $trainerRepo,
        SessionsRepository    $sessionsRepo,
        UsersRepository       $userRepo,
        AppointmentRepository $bookRepo,
        StripeRepository      $stripeRepo,
        MessageRepository     $messageRepository
    ) {
        $this->trainerRepository = $trainerRepo;
        $this->sessionsRepository = $sessionsRepo;
        $this->userRepository = $userRepo;
        $this->appointmentRepository = $bookRepo;
        $this->stripeRepository = $stripeRepo;
        $this->messageRepository = $messageRepository;
    }

    public function index()
    {
        $dashboardStats = $this->trainerRepository->getTraineeUpcommingSessions();
        return view('trainee.index', compact(['dashboardStats']));
    }
    public function trainer()
    {
        $trainers = $this->trainerRepository->getAllTrainers();
        return view('trainee.trainer', compact(['trainers']));
    }

    public function getTrainers() {

        // $trainers = $this->trainerRepository->getAllTrainers(); 
        $trainers = $this->trainerRepository->getTrainersByLocation();
        return view('trainee.trainer', compact(['trainers']));
    }

    public function trainermsg(Request $req)
    {
        $sendTo = $req->id;
        $userInfo = $this->userRepository->getUserbyId($sendTo);
        $messages = $this->messageRepository->RequestMessagesById($sendTo);
        return view('trainee.trainerchat', compact('userInfo', 'messages'));
    }

    public function trainerSearch(Request $request)
    {
        // $trainers = $this->trainerRepository->trainerSearch($request);
        $trainers = $this->trainerRepository->trainerSearchByLocation($request);
        return view('trainee.trainer', compact(['trainers']));
    }


    public function trainerSearchDashboard(Request $request)
    {
        $trainers = $this->trainerRepository->trainerSearch($request);
        return view('trainee.trainer', compact(['trainers']));
    }

    public function upcomingSession()
    {
        $upcommingSesions = $this->sessionsRepository->getUpcomingSessions('trainee');
        return view('trainee.upcomingSession', compact(['upcommingSesions']));
    }

    public function previousSession()
    {
        $previousSesions = $this->sessionsRepository->getPreviousSessions('trainee');
        return view('trainee.previousSession', compact(['previousSesions']));
    }

    public function paymentInfo()
    {
        $user = Auth::user();
        return view('trainee.paymentInfo', compact(['user']));
    }

    // stripe

    public function cstore(Request $request)
    {

        request()->validate([
            'card_name' => 'required',
            'card' => 'required',
            'exp_month' => 'required',
            'exp_year' => 'required',
            'cvv' => 'required',
        ]);

        return $this->stripeRepository->saveCard($request);
    }

    public function traineeProfile()
    {
        $countries = Countries::pluck('name', 'id');
        $states = State::select('id', 'name', 'country_id')->get();
        $profile = $this->trainerRepository->getProfile(Auth::user()->id);
        return view('trainee.traineeProfile', compact(['profile', 'countries', 'states']));
    }

    public function profileUpdate(Request $request)
    {
        $input = $request->all();
        $profile = $this->userRepository->profileUpdate($input);
        if ($profile == true) {
            $msg = 'Profile Updated successfully';
        } else
            $msg = 'Something Went Wrong';

        return redirect()->route('trainee_profile')->with('success', $msg);
    }

    public function trainerProfile($trainerId)
    {
        $trainer = $this->trainerRepository->getProfile($trainerId);
        $reviews = $this->trainerRepository->getReviews($trainerId);
        $timeSchedules = TimeSchedule::get();
        $times = $this->trainerRepository->trainerTimeById($trainerId);

        return view('trainee.trainerProfile', compact(['trainer', 'reviews', 'timeSchedules', 'times']));
    }

    public function appointment(Request $request) {

        $id = $request->route('id');
        $sendTo = $id;
        $userInfo = $this->userRepository->getUserbyId($sendTo);
        $messages = $this->messageRepository->RequestMessagesById($sendTo);
        $data = [];
        $data['trainer_id'] = $id;
        $data['selectedDate'] = Carbon::now()->format('Y-m-d');
        $data['selectedDay'] = Carbon::now()->dayOfWeek;
        $timings = $this->trainerRepository->getSessionTimings($data);
        $trainer = $this->trainerRepository->getTrainerById($id);

        (!empty($trainer)) ? $trainer_id = $trainer->id: $trainer_id = 0;
        $trainee_id = auth()->user()->id;

        return view('trainee.appointment', compact(['timings', 'data', 'trainer', 'userInfo', 'messages',"trainer_id", "trainee_id"]));
    }

    public function appointment_cancel($id, Request $request) {

        $trainingSession = TrainingSessions::find($id);
        if (empty($trainingSession)) {

            if ($request->ajax()) {
                return response()->json([ "status" => "fail", "msg" => "Training session not found" ]);
            }

            return redirect()->back()->withErrors(['msg' => "Training session not found" ]);
        }

        $session_datetime = $trainingSession->date." ".$trainingSession->start_time;

        $current_datetime = Carbon::now()->timezone(config('app.timezone'));

        $session_creation_datetime = $trainingSession->created_at->timezone(config('app.timezone'));
        $creation_hours_diff = $current_datetime->diffInHours($session_creation_datetime);
        if ($creation_hours_diff < 24) {

            $userPayment = UserPayments::where("session_id", $trainingSession->id)->first();
            if (empty($userPayment)) {

                if ($request->ajax()) {
                    return response()->json([ "status" => "fail", "msg" => "Payments details not found." ]);
                }

                return redirect()->back()->withErrors(['msg' => "Payments details not found." ]);
            }

            $refund = $this->stripeRepository->refundByChargeId($trainingSession->id);
            if ($refund == 1) {

                $flag = $trainingSession->update([
                                    "status"    => "cancelled",
                                    "payment_status"    => "Refund",
                                    "cancelled_by"  => auth()->user()->id
                                ]);
                if ($flag) {

                    UserPayments::where("session_id", $trainingSession->id)->update([ "payment_status" => "Refund" ]);
                    Mail::to(auth()->user()->email)->send(new TraineeAppointmentCancel(auth()->user(), true));
                }

                if ($request->ajax()) {
                    return response()->json([ "status" => "success", "msg" => "You session has been cancelled with refund." ]);
                }

                return redirect()->back()->withErrors(['msg' => "You session has been cancelled with refund." ]);
            }
        }

        $session_start_datetime = Carbon::createFromFormat("Y-m-d H:i A", $session_datetime, config('app.timezone'));
        $total_hours_diff = $current_datetime->diffInHours($session_start_datetime);
        if ($total_hours_diff < 24) {

            $trainingSession->update(["status" => "cancelled", "cancelled_by" => auth()->user()->id ]);
            Mail::to(auth()->user()->email)->send(new TraineeAppointmentCancel(auth()->user(), false));

            if ($request->ajax()) {
                return response()->json([ "status" => "success", "msg" => "You session has been cancelled without refund." ]);
            }

            return redirect()->back()->withErrors(['msg' => "You session has been cancelled without refund." ]);
        }

        if ($request->ajax()) {
            return response()->json([ "status" => "fail", "msg" => "You session hasn't been cancelled." ]);
        }

        return redirect()->back()->withErrors(['msg' => "You session hasn't been cancelled." ]);
    }


    public function appointment_cancel_off(Request $request) {

        $user_id = Auth::user()->id;
        $session_id = $request->route('id');
        $traingSessionInfo = TrainingSessions::where('id', $session_id)->first();

        $today = Carbon::now()->format('Y-m-d');
        $explode_today = explode('-', $today);
        $current_month = $explode_today[1];
        $current_year = $explode_today[0];
        $today_day = $explode_today[2];
        $session_date = $traingSessionInfo->date;
        $session_date = explode(' ', $session_date);
        $explode_session_date = explode('-', $session_date[0]);
        $session_month = $explode_session_date[1];
        $session_day = $explode_session_date[2];
        $session_year = $explode_session_date[0];
        $msg = '';
        if ($today <= $session_date[0]) {
            if ($session_year >= $current_year) {
                if ($session_month > $current_month) {
                    $day_diff = $today_day - $session_day;
                } else {
                    $day_diff = $session_day - $today_day;
                }
            } else {
                $msg = 'you cannot Cancel . Something went wrong';
            }
            if ($day_diff <= 1) {
                $current_time = Carbon::now()->format('H:i A');
                $time_split = explode(':', $current_time);
                $current_hour = $time_split[0];
                $current_time = explode(' ', $time_split[1]);
                $current_min = $current_time[0];
                $current_meridiem = $current_time[1];

                $traingSessionInfo_timehour = explode(':', $traingSessionInfo->start_time);
                $traingSessionInfo_hour = $traingSessionInfo_timehour[0];

                if ($current_meridiem == 'PM') {
                    $current_hour = $current_hour + 12;
                }
                if ($traingSessionInfo_hour == 'PM') {
                    $traingSessionInfo_hour = $traingSessionInfo_hour + 12;
                }
                if (($traingSessionInfo_hour - $current_hour) <= 24) {

                    $training_session = TrainingSessions::where('id', $session_id)
                        ->update(['status' => 'cancelled', 'cancelled_by' => $user_id]);
                    // $user_payemnts = UserPayments::get();
                    // if (!$user_payemnts->isEmpty()) {

                    //     $refund = $this->stripeRepository->refundByChargeId($session_id);
                    //     $msg = 'Session is being cancelled ' . ($refund ? "& Amount has been refunded to you" :"");
                    //     Mail::to(Auth::user()->email)->send(new TraineeAppointmentCancel(Auth::user(), true));
                    // } else {

                    //     $msg = 'Session is being cancelled';
                    //     Mail::to(Auth::user()->email)->send(new TraineeAppointmentCancel(Auth::user(), false));
                    // }

                } else {
                    $msg = $traingSessionInfo_hour - $current_hour . ' = ours left . You cannot cancel';
                }
            } elseif ($day_diff > 1) {
                TrainingSessions::where('id', $session_id)
                    ->update(['status' => 'cancelled', 'cancelled_by' => $user_id]);

            } else {
            }
        } else {
            if ($today > $session_date[0]) {
                $msg = 'you cannot Cancel . Your appointment date is Passed.';
            } elseif ($traingSessionInfo->status == 'confirmed') {

                $msg = 'you cannot Cancel . Your appointment is Confirmed.';
            } else {
                $msg = 'you cannot Cancel . Your appointment is Scheduled.';
            }
        }

        $user_payemnts = UserPayments::get();
        if (!$user_payemnts->isEmpty()) {

            $refund = $this->stripeRepository->refundByChargeId($session_id);
            $msg = 'Session is being cancelled ' . ($refund ? "& Amount has been refunded to you" :"");
            Mail::to(Auth::user()->email)->send(new TraineeAppointmentCancel(Auth::user(), true));
        } else {

            $msg = 'Session is being cancelled';
            Mail::to(Auth::user()->email)->send(new TraineeAppointmentCancel(Auth::user(), false));
        }


        if ($request->ajax()) {
            return response()->json([ "status" => "success", "msg" => $msg]);
        }

        return redirect()->back()->withErrors(['msg' => $msg]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function bookAppointment(Request $request)
    {

        $input = $request->all();

        if ($input['start_time'] != '00') {

            $book = $this->appointmentRepository->bookAppointment($input);
            return redirect()->route('upcoming_session1');
        }

        return Redirect::back()->withErrors(['msg' => 'Please Select Time Slot!']);
    }

    public function bookAppointmentWithStripe(Request $request)
    {

        $payment = [];
        if ($request->has("card")) {

            $payment = [
                'card_name' => 'required',
                'card' => 'required',
                'exp_month' => 'required',
                'exp_year' => 'required',
                'cvv' => 'required',
            ];
        }

        $appoint = [
            'card_data' => 'required',
            "trainerId" => 'required',
            "selectedDate" => 'required',
            "start_time" => 'required',
            "trainingPreference" => 'required',
            "preferedLocation" => 'required'
        ];

        if ($request->has("card_data") && $request->get("card_data") == "1") {

            request()->validate($appoint);
        } else {

            $array = array_merge($payment, $appoint);
            request()->validate($appoint);
        }

        $input = $request->input();

        if ($request->get("card_data") == "1") {

            if ($input['start_time'] != '00') {
                // dd($input);
                $book = $this->appointmentRepository->bookAppointment($input);
                if ($request->ajax()) {
                    return response()->json(['url' => route('upcoming_session1'), 'stripe_response' => null, 'appointment' => $book], 200);
                }

                return redirect()->route('upcoming_session1');
            }

            if ($request->ajax()) {
                return response()->json(['url' => null, 'stripe_response' => null, 'appointment' => null], 422);
            }

            return Redirect::back()->withErrors(['msg' => 'Please Select Time Slot!']);
        }

        $response = $this->stripeRepository->saveCard($request->all());

        if ($response['status'] != 'success') {

            if ($request->ajax()) {
                return response()->json(['url' => null, 'stripe_response' => $response, 'appointment' => null], 422);
            }

            return Redirect::back()->withErrors(['error' => "Your card details are incorrect"]);
        }

        if ($input['start_time'] != '00') {

            $book = $this->appointmentRepository->bookAppointment($input);

            if ($request->ajax()) {
                return response()->json(['url' => route('upcoming_session1'), 'stripe_response' => $response, 'appointment' => $book], 200);
            }

            return redirect()->route('upcoming_session1');
        }

        if ($request->ajax()) {
            return response()->json(['url' => null, 'stripe_response' => null, 'appointment' => null], 422);
        }

        return Redirect::back()->withErrors(['error' => 'Please Select Time Slot!']);
    }


    public function getSessionTimings(Request $request)
    {
        $trainer = $this->trainerRepository->getSessionTimings($request->all());
        return $trainer;
    }

    public function profileImageUpdate(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $trainer = $this->trainerRepository->profileImageUpdate($request->all(), 'trainee');
        return $trainer;
    }

    public function passwordUpdate(Request $request)
    {
        $trainee = $this->trainerRepository->passwordUpdate($request->all());
        return response()->json($trainee, $trainee['code']);
    }

    public function reviewPosted(Request $request)
    {
        //        dd($request);
        $response = $this->trainerRepository->reviewPosted($request->all());
        return redirect()->back();
        //        return redirect()->route('trainer_profile', ['id' => $request->trainer_id]);
    }
    public function getPriceBbyLocation(Request $request)
    {
        $trainerId =  $request->trainer_id;
        $trainer =  User::find($trainerId);
        if ($request->preferedLocation == 'myLocation') {
            $location_user = $trainer;
        } else {
            $location_user = auth()->user();
        }
        if(!get_price_by_location($location_user,'one_on_1_training_charge')){
            return  response()->json(['html' => "No Location found", 'success' => false],400);
        }
        $view = view("components.appointment-price", compact('trainer', 'location_user'))->render();
        return  response()->json(['html' => $view, 'success' => true]);
    }
}
