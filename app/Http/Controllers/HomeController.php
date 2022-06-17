<?php

namespace App\Http\Controllers;

use Mail;
use Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Mail\ContactUs;
use App\Models\Message;
use App\Models\CmsPages;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        dd('hallo');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function messages ($trainer_id, $trainee_id, $type = "trainee") {

        if (empty($trainee_id)) {
            return response()->json([ "error" => 1, "message" => "Trainee not found" ]);
        }

        if (empty($trainer_id)) {
            return response()->json([ "error" => 1, "message" => "Trainer not found" ]);
        }

        $messages = Message::where('trainee_id', $trainee_id)
                        ->where('trainer_id', $trainer_id)
                        ->with([ "trainer", "trainee" ])
                        ->get();

        if ($type == "trainee") {
            $view =  view('common.messages', compact('messages'))->render();
        } else {
            $view =  view('trainer.common.messages', compact('messages'))->render();
        }

        return response()->json([ "error" => 0, "message" => "Messages fetch successfully", "view" => $view ]);
    }

    public function contactusmail(Request $request) {

        Mail::to(config('mail.from.address'))->send(new ContactUs($request->all()));

        return response()->json([
            "status"  => "success",
            "code"  => 200,
            "message"   => "Thank you!. We will contact you soon.",
        ]);
    }

    public function confirmEmail($code)
    {
        $check = User::where('confirmation_code', $code)->first();
        
        if ($check) {
            $check->update([
                // 'status' => 'approved',
                'is_confirmed' => 1,
                'confirmation_code' => NULL,
                'email_verified_at' => Carbon::now(),
            ]);
        }
        
        return redirect()->route('accountLogin')->with(['success'=>'Your email has been verified']);
    }

    public function search_trainers(Request $request) {

        $keyword = '';
        $training_type='';
        $rating= $request->rating ? $request->rating : 'ASC';

        $results = User::where('role_id', 2)->with(['getAddress.getRatesForLocation','getAddress.getRatesForTrainer'])
            ->leftjoin('address', 'address.user_id', 'users.id')
            ->leftjoin('profiles as profile', 'profile.user_id', 'users.id')
            ->leftjoin('reviews as review', 'review.trainer_id', 'users.id')
            ->leftjoin('charges', 'charges.location', 'address.country_id')
            ->leftjoin('countries', 'countries.id', 'address.country_id')
            ->where('charges.user_type', 'for_trainer');
        if (isset($request->keyword)) {
            $title = $request->keyword;
            $keyword = $request->keyword;
            
            $results->Where(function ($query) use ($title) {
                $query->where('countries.name', 'LIKE', "%" . $title . "%")
                    // ->orwhere('users.email', 'LIKE', "%" . $title . "%")
                    ->where('users.role_id', '=', 2);
            });
        }
        if (isset($request->rating)) {
            $rating = $request->rating;

        }
        if (isset($request->training_type)) {
            $training_type = $request->training_type;
             $results->whereHas('getAddress', function($cat) use ($training_type){
                $cat->where('training_session', 'LIKE', "%" . $training_type . "%");
            }) ;

        }
        $results = $results
        ->select('users.id', 'users.name', 'users.email', 'users.experience', 'users.profile_image',
                'profile.about',
                'profile.specialties', 'review.rating','countries.id as countryID','countries.name as countryName')->orderBy('review.rating',$rating)
        ->groupBy('users.id')->get();

        return view('web/trainer', compact(['results', 'keyword']));
    }

}
