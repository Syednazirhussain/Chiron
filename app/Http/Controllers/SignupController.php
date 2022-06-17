<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Countries;
use App\Models\State;
use App\Http\Controllers\Controller;
use App\Repositories\UsersRepository;
use Validator;

use Stripe;
use Config;

class SignupController extends Controller
{
    protected $usersRepository;
    
    public function __construct(UsersRepository $userRepo) {

        $this->usersRepository = $userRepo;
    }

    public function showTrainerSignupForm() {

        $countries = Countries::pluck('name','id');
        $states = State::select('id','name','country_id')->get();
        
        return view('web/account/signup/trainer', compact(['countries','states']));
    }

    public function trainerSignup(Request $request) {

        $request->validate([
            'email' => ['required','unique:'.(new User)->getTable().',email'],
            'utility_bill' => 'mimetypes:application/pdf,image/jpeg,image/png',
            'govt_identification' => 'mimetypes:application/pdf,image/jpeg,image/png',
            'cpr_training_certificate' => 'mimetypes:application/pdf,image/jpeg,image/png',
            'personal_training_certificate' => 'mimetypes:application/pdf,image/jpeg,image/png',
        ]);

        $input = $request->except(['_method']);
        $response = $this->usersRepository->registerAttempt($input, 'trainer');
		
        return response()->json($response, $response['code']);
    }

    public function loginAttempt(Request $request) {

        $input = $request->all();
        $validator = Validator::make($input, [
            'email'     => ['required', 'email'],
            'password'  => ['required'],
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status'    => 'error',
                'code'      => 422,
                'payload'   => $validator->errors(),
            ]);
        }

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $response = $this->usersRepository->loginAttempt($request, $credentials);
		return response()->json($response, $response['code']);
    }

    public function showTraineeSignupForm() {

        $countries = Countries::pluck('name','id');
        $states = State::select('id','name','country_id')->get();
        return view('web.account.signup.trainee', compact(['countries','states']));
    }
    
    public function traineeSignup(Request $request) {

        $request->validate([
            'fullname' => ['required','string'],
            'address' => ['required'],
            'postalCode' => ['required'],
            'Dob' => ['required'],
            'privacy' => ['required'],
            'password' => 'required|confirmed|min:8',
            'email' => ['required','unique:'.(new User)->getTable().',email']
        ]);
        
        $input = $request->except(['_method']);
		$response = $this->usersRepository->registerAttempt($input, "trainee");

        return response()->json($response, $response['code']);
    }

    public function checkEmailForReg(Request $request){
        $check = User::where('email',$request->email)->get();
        if (count($check) > 0) {
            return 'false';
        }else{
            return 'true';
        }
    }

    public function trainees () {

        return view('trainer.trainees');
    }

    public function  upcomingSession () {

        return view('trainer.upcomingSession');
    }

    public function  previousSession () {

        return view('trainer.previousSession');
    }

    public function  earnings () {

        return view('trainer.earnings');
    }

    public function  message () {

        return view('trainer.message');
    }

}
