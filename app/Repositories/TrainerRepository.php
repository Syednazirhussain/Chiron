<?php

namespace App\Repositories;

use Str;
use Hash;
use Storage;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Images;
use App\Models\Review;
use App\Models\Address;
use App\Models\Profile;
use App\Models\Documents;
use App\Models\SessionTiming;
use App\Models\TrainingSessions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

/**
 * Class TrainerRepository
 * @package App\Repositories
 * @version November 1, 2021, 4:28 pm UTC
 */
class TrainerRepository
{
    /**
     * @var array
     */

    /**
     * Return searchable fields
     *
     * @return array
     */


    public function model()
    {
    }

    public function getFieldsSearchable()
    {
    }


    public function gettrainerDashboardData()
    {
        $upcomingSessions = TrainingSessions::where('trainer_id', Auth::user()->id)
            ->where('status', '!=', 'completed')
            ->with([
                'trainee',
            ])
            ->orderby('id', 'desc')
            ->get();

        $previousSessions = TrainingSessions::where('trainer_id', Auth::user()->id)
            ->where('status', 'completed')
            ->with([
                'trainee', 'userPayments'
            ])
            ->orderby('id', 'desc')
            ->get();

        $lastWeekSessions = TrainingSessions::join('user_payments', 'user_payments.id', 'training_sessions.payment_id')
            ->where('training_sessions.trainer_id', Auth::user()->id)
            ->where('training_sessions.status', '!=', 'pending')
            ->where('training_sessions.status', '!=', 'cancelled')
            ->where('training_sessions.status', '!=', 'decline')
            ->where('training_sessions.status', '!=', 'confirmed')
            ->select(DB::raw('SUM(user_payments.amount) + SUM(user_payments.tax_amount) - SUM(user_payments.pro_rate_billing) as totalEarnings'))
            ->first();

        $totalEarnings = 0;
        if (!empty($lastWeekSessions)) {
            $totalEarnings = $lastWeekSessions->totalEarnings;
        }

        $data = [
            'previousSessions' => $previousSessions,
            'upcomingSessions' => $upcomingSessions,
            'totalEarnings' => $totalEarnings,
        ];

        return $data;
    }

    public function getProfile($trainerId = 0)
    {
        if ($trainerId == 0) {
            $trainerId = Auth::user()->id;
        }
        $profile = User::where('id', $trainerId)
            ->with([
                'getAddress',
                'getAddress.getRatesForTrainer',
                'getAddress.getCountry',
                'getDocuments',
                'getProfile',
                'getProfile.getSessionTimings',
                'getImages',
            ])->first();
        return $profile;
    }

    public function times()
    {
        $sessionTimings = SessionTiming::where('user_id', Auth::user()->id)->get();
        $sessionTime = [];
        $data = [];
        $mo = [];
        $tu = [];
        $we = [];
        $th = [];
        $fr = [];
        $sa = [];
        $su = [];
        foreach ($sessionTimings as $row) {
            if ($row->day == 'MO') {
                $mo[] = $row->time;
            } elseif ($row->day == 'TU') {
                $tu[] = $row->time;
            } elseif ($row->day == 'WE') {
                $we[] = $row->time;
            } elseif ($row->day == 'TH') {
                $th[] = $row->time;
            } elseif ($row->day == 'FR') {
                $fr[] = $row->time;
            } elseif ($row->day == 'SA') {
                $sa[] = $row->time;
            } elseif ($row->day == 'SU') {
                $su[] = $row->time;
            }
        }
        $data['MO'] = $mo;
        $data['TU'] = $tu;
        $data['WE'] = $we;
        $data['TH'] = $th;
        $data['FR'] = $fr;
        $data['SA'] = $sa;
        $data['SU'] = $su;

        return $data;
    }

    public function trainerTimeById($trainerID)
    {
        $sessionTimings = SessionTiming::where('user_id', $trainerID)->get();
        $sessionTime = [];
        $data = [];
        $mo = [];
        $tu = [];
        $we = [];
        $th = [];
        $fr = [];
        $sa = [];
        $su = [];
        foreach ($sessionTimings as $row) {
            if ($row->day == 'MO') {
                $mo[] = $row->time;
            } elseif ($row->day == 'TU') {
                $tu[] = $row->time;
            } elseif ($row->day == 'WE') {
                $we[] = $row->time;
            } elseif ($row->day == 'TH') {
                $th[] = $row->time;
            } elseif ($row->day == 'FR') {
                $fr[] = $row->time;
            } elseif ($row->day == 'SA') {
                $sa[] = $row->time;
            } elseif ($row->day == 'SU') {
                $su[] = $row->time;
            }
        }
        $data['MO'] = $mo;
        $data['TU'] = $tu;
        $data['WE'] = $we;
        $data['TH'] = $th;
        $data['FR'] = $fr;
        $data['SA'] = $sa;
        $data['SU'] = $su;

        return $data;
    }

    public function getTrainerById($id)
    {
        $trainer = User::where('id', $id)
            ->where('status', "approved")
            ->with([
                'getAddress',
            ])
            ->first();
        return $trainer;
    }

    public function getAllTrainers()
    {

        $trainers = User::where('role_id', 2)
                        ->where('status', "approved")
                        ->with([
                            'getAddress', 'trainerTrainingSessionCount',
                            'getAddress.getRatesForTrainer',
                            'getAddress.getRatesForLocation',
                            'messages'
                        ])
                        ->get();

        $response = [
            'data' => $trainers,
            'keyword' => '',
            'trainingSession' => '',
        ];
        return $response;
    }

    /// for location baased trainer list related to traineee addresss By Azam
    public function getTrainersByLocation()
    {
        $trainee_location = User::where('role_id', 3)->where('users.id',auth()->user()->id)
        ->leftjoin('address', 'address.user_id', 'users.id')->pluck('country_id')->toArray();
    
        $trainers = User::where('users.role_id', 2)
                        ->where('users.status', "approved")
                        ->whereIn('countries.id', $trainee_location)
                        ->with([
                            'getAddress', 'trainerTrainingSessionCount',
                            'getAddress.getRatesForTrainer',
                            'getAddress.getRatesForLocation',
                            'messages'
                        ])->leftjoin('address', 'address.user_id', 'users.id')
                        ->leftjoin('countries', 'countries.id', 'address.country_id')
                        ->select('users.*','countries.id as c_id','address.id as a_id')
                       
                        ->get();
                            // dd( $trainers);
        $response = [
            'data' => $trainers,
            'keyword' => '',
            'trainingSession' => '',
        ];
        return $response;
    }

    public function trainerSearch($request)
    {


        $trainers = User::where('users.role_id', 2)
            ->where('users.status', 'approved');
        if (isset($request->keyword)) {
            $title = $request->keyword;
            $trainers = $trainers->where('users.email', 'LIKE', "%" . $title . "%");
            if ($request->trainingSession) {
                $trainingSession = $request->trainingSession;
                $trainers = $trainers->whereHas('getAddress', function ($query) use ($trainingSession) {
                    $query->where('training_session', 'LIKE', "%" . $trainingSession . "%");
                });
            }
            $trainers = $trainers->orWhere(function ($query) use ($title) {
                $query->where('users.name', 'LIKE', "%" . $title . "%")
                    ->where('users.role_id', '=', 2);
            });
        }

        if ($request->trainingSession) {
            $trainingSession = $request->trainingSession;
            $trainers = $trainers->whereHas('getAddress', function ($query) use ($trainingSession) {
                $query->where('training_session', 'LIKE', "%" . $trainingSession . "%");
            });
        }
        $trainers = $trainers->get();
        $data = $trainers;

        $response = [
            'data' => $data,
            'keyword' => $request->keyword,
            'trainingSession' => $request->trainingSession,
        ];
        return $response;
    }
    public function trainerSearchByLocation($request)
    {
        $trainee_location = User::where('role_id', 3)->where('users.id',auth()->user()->id)
        ->leftjoin('address', 'address.user_id', 'users.id')->pluck('country_id')->toArray();

        $trainers = User::where('users.role_id', 2)
            ->where('users.status', 'approved')
            ->whereIn('countries.id', $trainee_location)
            ->leftjoin('address', 'address.user_id', 'users.id')
                        ->leftjoin('countries', 'countries.id', 'address.country_id')
                       ;
        if (isset($request->keyword)) {
            $title = $request->keyword;
            $trainers = $trainers->where('users.email', 'LIKE', "%" . $title . "%");
            if ($request->trainingSession) {
                $trainingSession = $request->trainingSession;
                $trainers = $trainers->whereHas('getAddress', function ($query) use ($trainingSession) {
                    $query->where('training_session', 'LIKE', "%" . $trainingSession . "%");
                });
            }
            $trainers = $trainers->orWhere(function ($query) use ($title) {
                $query->where('users.name', 'LIKE', "%" . $title . "%")
                    ->where('users.role_id', '=', 2);
            });
        }

        if ($request->trainingSession) {
            $trainingSession = $request->trainingSession;
            $trainers = $trainers->whereHas('getAddress', function ($query) use ($trainingSession) {
                $query->where('training_session', 'LIKE', "%" . $trainingSession . "%");
            });
        }
        $trainers = $trainers ->select('users.*','countries.id as c_id','address.id as a_id')->get();
        $data = $trainers;

        $response = [
            'data' => $data,
            'keyword' => $request->keyword,
            'trainingSession' => $request->trainingSession,
        ];
        return $response;
    }


    public function traineeSearch($request)
    {

        $trainee = User::where('role_id', 3)
            ->join('training_sessions', 'training_sessions.trainee_id', 'users.id')
            ->join('address', 'address.user_id', 'users.id')
            ->where('training_sessions.status', '!=', 'pending')
            ->where('training_sessions.status', '!=', 'cancelled')
            ->where('training_sessions.status', '!=', 'decline')
            ->where('training_sessions.training_session', $request->trainingSession)
            ->where('training_sessions.trainer_id', Auth::user()->id)
            ->groupBy('training_sessions.trainee_id');
        if (isset($request->keyword)) {
            $title = $request->keyword;
            $trainee = $trainee->orwhere('users.email', 'LIKE', "%" . $title . "%");

            $trainee = $trainee->orWhere(function ($query) use ($title) {
                $query->where('users.name', 'LIKE', "%" . $title . "%")
                    ->where('users.role_id', '=', 3);
            });
        }
        $trainee = $trainee->get();

        $response = [
            'data' => $trainee,
            'keyword' => $request->keyword,
            'trainingSession' => $request->trainingSession,
        ];
        // dd($response);
        return $response;
    }

    public function uploadDocuments ($input = []) {

        if (array_key_exists("file", $input)) {

            $imageTypes = ["image/jpeg", "image/png"];
            $documentTypes = ["application/pdf", "application/msword"];

            $files = $input["file"];
            $files_name = $input["file_name"];

            foreach($files as $key => $file) {

                $source_type = NULL;
                if (in_array($file->getMimeType(), $imageTypes)) {
                    $source_type = "image";
                } else if (in_array($file->getMimeType(), $documentTypes)) {
                    $source_type = "document";
                }

                $file_name = (!empty($files_name[$key])) ? $files_name[$key] : $file->getClientOriginalName();
                $path = Storage::disk('public')->putFile(config('constants.TRAINER_DOCS'), $file);

                Documents::updateOrCreate(
                    [
                        'user_type'     => 'trainer',
                        'source_type'   => $source_type,
                        'document_type' => $file_name,
                        'user_id'       => auth()->user()->id,
                        'source'        => $path
                    ],
                );

                DB::commit();
            }

            return [
                "status" => "success",
                "code" => 200,
                "message" => "Document uploaded successfully",
            ];
        }

        return [
            "status" => "fail",
            "code" => 422,
            "message" => "File not found.",
        ];
    }

    public function profileUpdate($input)
    {
        DB::beginTransaction();
        try {

            if (array_key_exists("file", $input)) {

                $files = $input["file"];
                $files_name = isset($input["file_name"]) ? $input["file_name"] : false;

                foreach($files as $key => $file) {

                    $source_type = $file->getMimeType();
                    $file_name = ($files_name && !empty($files_name[$key])) ? $files_name[$key] : $file->getClientOriginalName();
                    if ($source_type == "image/jpeg" || $source_type == "image/png") {

                        $path = Storage::disk('public')->putFile(config('constants.TRAINER_PROFILE'), $file);
                        Images::updateOrCreate(
                            [
                                'user_type'     => 'trainer',
                                'source_type'   => "image",
                                'user_id'       => auth()->user()->id,
                                'document_type' => $file_name,
                                'source'        => $path
                            ],
                        );
                    } elseif ($source_type == "application/pdf" || $source_type == "application/msword") {

                        $path = Storage::disk('public')->putFile(config('constants.TRAINER_DOCS'), $file);
                        Documents::updateOrCreate(
                            [
                                'user_type'     => 'trainer',
                                'source_type'   => "document",
                                'document_type' => $file_name,
                                'user_id'       => auth()->user()->id,
                                'source'        => $path
                            ],
                        );
                    }

                    DB::commit();
                }

                return 'Success';
            }

            if (isset($input['type'])) {
                if ($input['type'] == 'image') {
                    if (isset($input['file'])) {
                        $ext = $input['file']->getClientOriginalExtension();
                        if ($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg' || $ext == 'pdf') {
                            $path = public_path('assets/trainer/images');
                            if ($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg') {
                                $source_type = 'image';
                            } else {
                                $source_type = 'document';
                            }
                            $fileName = time() . '.' . $input['file']->getClientOriginalExtension();
                            if ($input['file']->move($path, $fileName)) {
                                $image = new Images();
                                $image->user_id = Auth::user()->id;
                                $image->user_type = 'trainer';
                                $image->source_type = $source_type ?? '';
                                $image->source = $fileName ?? '';
                                $image->save();
                                DB::commit();
                                return 'Success';
                            } else {
                                return 0;
                            }
                        } else {
                            return 'file format not supported';
                        }
                    } else {
                        return 0;
                    }
                }
            }

            if (isset($input['type'])) {
                if ($input['type'] == 'document') {
                    if (isset($input['file'])) {
                        $path = public_path('assets/trainer/documents');
                        foreach ($input['file'] as $key => $file) {
                            $fileName = Str::slug(time() . $file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
                            if ($file->move($path, $fileName)) {
                                $document = Documents::updateOrCreate(
                                    [
                                        'user_type'     => 'trainer',
                                        'source_type'   => 'document',
                                        'user_id'       => auth()->user()->id
                                    ],
                                    [ 'source' => $fileName ]
                                );
                                /*
                                $image = new Documents();
                                $image->user_id = Auth::user()->id;
                                $image->user_type = 'trainer';
                                $image->source_type = 'document';
                                $image->source = $fileName;
                                $image->save();
                                */
                            } else {
                                return 0;
                            }
                        }
                        DB::commit();
                        return 'Success';
                    } else {
                        return 0;
                    }
                }
            }

            if (isset($input['type'])) {
                if ($input['type'] == 'specialties') {
                    $profile = Profile::where('user_id', Auth::user()->id)->where('user_type', 'trainer')->first();

                    if (!empty($profile)) {
                        if (!empty($profile->specialties)) {
                            $specialties = json_decode($profile->specialties, true);
                            array_push($specialties, $input['specialties']);
                            $specialties = json_encode($specialties);
                        } else {
                            $spec[] = $input['specialties'];
                            $specialties = json_encode($spec);
                        }
                    } else {
                        $spec[] = $input['specialties'];
                        $specialties = json_encode($spec);
                    }

                    if (empty($profile)) {
                        $profile = new Profile();
                        $profile->user_id = Auth::user()->id;
                        $profile->user_type = 'trainer';
                        $profile->specialties = $specialties;
                        $profile->save();
                        DB::commit();
                        return 1;
                    } else {
                        Profile::where('user_id', Auth::user()->id)->update(['specialties' => $specialties]);
                        DB::commit();
                        return 1;
                    }
                }
            }

            if (isset($input['type'])) {
                if ($input['type'] == 'removeSpecialties') {
                    $profile = Profile::where('user_id', Auth::user()->id)->where('user_type', 'trainer')->first();
                    $specialties = json_decode($profile->specialties, true);
                    $pos = array_search($input['specialties'], $specialties);
                    unset($specialties[$pos]);
                    $specialties = json_encode($specialties);
                    Profile::where('id', $profile->id)->update(['specialties' => $specialties]);
                    DB::commit();
                    return 1;
                }
            }

            User::where('id', Auth::user()->id)
                ->update([
                    'name' => $input['name'],
                ]);

            $profile = Profile::where('user_id', Auth::user()->id)->where('user_type', 'trainer')->first();
            if (empty($profile)) {
                $profile = new Profile();
                $profile->user_id = Auth::user()->id;
                $profile->user_type = 'trainer';
                $profile->about = $input['about'] ?? '';
                $profile->about = $input['insta'] ?? '';
                $profile->about = $input['twitter'] ?? '';
                $profile->about = $input['facebook'] ?? '';
                $profile->save();
            } else {
                Profile::where('user_id', Auth::user()->id)
                    ->where('user_type', 'trainer')
                    ->update([
                        'about' => $input['about'] ?? '',
                        'insta' => $input['insta'] ?? '',
                        'twitter' => $input['twitter'] ?? '',
                        'facebook' => $input['facebook'] ?? '',
                    ]);
            }

            $location = '';
            $location1 = '';

            if (isset($input['location'])) {
                $location = $input['location'] ?? '';
            }
            if (isset($input['location1'])) {
                $location1 = $input['location1'] ?? '';
            }
            if (isset($location) && $location != null && isset($location1) && $location1 != null) {
                $location = $location . ',' . $location1;
            }
            if ($location == null) {
                $location = $location1;
            }
            $training_session = '';
            $training_session1 = '';
            if (isset($input['training_session'])) {
                $training_session = $input['training_session'];
            }
            if (isset($input['training_session1'])) {
                $training_session1 = $input['training_session1'];
            }
            if (isset($training_session) && $training_session != null && isset($training_session1) && $training_session1 != null) {
                $training_session = $training_session . ',' . $training_session1;
            }
            if ($training_session == null) {
                $training_session = $training_session1;
            }

            Address::where('user_id', Auth::user()->id)
                ->update([
                    'address' => $input['address'],
                    'training_session' => $training_session ?? '',
                    'location' => $location ?? '',
                    'country_id' => $input['country'] ?? '',

                ]);

            if (isset($input['timeSlot'])) {
                $timeSlot = $input['timeSlot'];
                $timeSlot = explode(',', $timeSlot);
                if (count($timeSlot) > 0) {
                    SessionTiming::where('user_id', Auth::user()->id)->where('user_type', 'trainer')->delete();
                    foreach ($timeSlot as $row) {
                        $firstTwoStringCharacter = substr($row, 0, 2);
                        $firstTwoStringCharacterRemoved = substr($row, 2);
                        $sessionTiming = new SessionTiming();
                        $sessionTiming->user_id = Auth::user()->id;
                        $sessionTiming->user_type = 'trainer';
                        $sessionTiming->day = $firstTwoStringCharacter;
                        $sessionTiming->time = $firstTwoStringCharacterRemoved;
                        $sessionTiming->save();
                    }
                }
            }
            DB::commit();
            $response = [
                'status' => 'success',
                'code' => 200,
                'message' => 'Saved',
            ];
            return response()->json($response);
        } catch (\Throwable $e) {
            DB::rollback();
            $response = [
                'status' => 'error',
                'code' => 404,
                'message' => $e->getMessage(),
            ];
            return response()->json($response);
        }
    }

    public function getSessionTimings($input)
    {
        $now_time = Carbon::now('GMT+5');
        $now_day_name = $now_time->format('l');
        $now_day_name = strtoupper($now_day_name[0] . $now_day_name[1]);

        $now_hour = $now_time->format('g');
        $am_pm = $now_time->format('A');
        $now_date = $now_time->format('Y-m-d');
        $date1 = $input['selectedDate'];
        $date2 = $now_date;
        $tt = TrainingSessions::where('trainer_id', $input['trainer_id'])
            ->whereDate('date', $input['selectedDate'])
            ->where('status', '!=', 'cancelled')
            ->where('status', '!=', 'decline')
            ->get();
        $bookedTimes = [];
        foreach ($tt as $row) {
            $bookedTimes[] = $row->start_time;
        }
        $days = ['0' => 'SU', '1' => 'MO', '2' => 'TU', '3' => 'WE', '4' => 'TH', '5' => 'FR', '6' => 'SA'];
        $selectedDay = $days[$input['selectedDay']];

        $timing = SessionTiming::where('user_id', $input['trainer_id'])
            ->where('user_type', 'trainer')
            ->where('day', $selectedDay)
            ->where('time', '<', $now_time)
            ->get();
        $times = [];

        if (count($timing) > 0) {
            foreach ($timing as $row) {
                if (!in_array($row->time, $bookedTimes)) {
                    if ($date1 == $date2) {
                        if ($now_day_name == $selectedDay) {
                            if ($am_pm == 'AM') {
                                if ((int)$now_hour < (int)$row->time[0] . (int)$row->time[1]) {
                                    $times[] = $row->time;
                                }
                                if ($row->time[6] . $row->time[7] == 'PM') {
                                    $times[] = $row->time;
                                }
                            }
                        }
                        if ($am_pm == 'PM') {
                            if ($row->time[6] . $row->time[7] == 'PM') {

                                if ($now_hour == '12') {
                                    $times[] = $row->time;
                                } else if ((int)$now_hour < (int)$row->time[0] . (int)$row->time[1]) {
                                    $times[] = $row->time;
                                }
                            }
                        }
                    } else {
                        $times[] = $row->time;
                    }
                } else {
                }
            }
        }

        // To unique times array
        $times = array_unique($times);

        if ($input['selectedDate'] == Carbon::now()->format('Y-m-d')) {
            $timeSlots = $times;
            $times = [];
            if (!empty($timeSlots)) {
                foreach ($timeSlots as $timeSlot) {

                    $time = Carbon::createFromFormat('H:i A', $timeSlot)->timezone(config('app.timezone'));
                    $currentTime = Carbon::now()->timezone(config('app.timezone'));

                    if ($time->gt($currentTime)) {

                        $times[] = $timeSlot;
                    }
                }
            }
        }

        return $times;
    }

    public
    function getTraineeUpcommingSessions()
    {
        $upcomingSessions = TrainingSessions::where('trainee_id', Auth::user()->id)
            ->where('status', '!=', 'completed')
            ->with([
                'myTrainersNames',
                'myTrainersNames.getAddress',
                'myTrainersNames.getAddress.getCountry',
            ])
            ->orderby('id', 'desc')->get();

        $previousSessions = TrainingSessions::where('trainee_id', Auth::user()->id)
            ->where('status', 'completed')
            ->with([
                'myTrainersNames',
                'myTrainersNames.getAddress',
                'myTrainersNames.getAddress.getCountry',
            ])
            ->orderby('id', 'desc')->get();
        $data = [
            'previousSessions' => $previousSessions,
            'upcomingSessions' => $upcomingSessions,
        ];
        return $data;
    }

    public
    function getMyTrainees()
    {
        $trainees = User::where('role_id', 3)
            ->with('messages')
            ->join('training_sessions', 'training_sessions.trainee_id', 'users.id')
            ->join('address', 'address.user_id', 'users.id')
            ->where('training_sessions.status', '!=', 'pending')
            ->where('training_sessions.status', '!=', 'cancelled')
            ->where('training_sessions.status', '!=', 'decline')
            ->where('training_sessions.trainer_id', Auth::user()->id)
            ->groupBy('training_sessions.trainee_id')
            ->get();
        $response = [
            'data' => $trainees,
            'keyword' => '',
            'trainingSession' => '',
        ];
        return $response;
    }

    public function removeDoc ($id) {

        $doc = Documents::whereId($id)->first();
        if ($doc) {
            $doc->delete();

            return [
                "status"    => "success",
                "code"  => 200,
                "message"   => "Document deleted successfully",
            ];
        }

        return [
            "status"    => "fail",
            "code"  => 404,
            "message"   => "Document not found.",
        ];
    }

    public function removeImg ($id) {

        $doc = Images::whereId($id)->first();
        if ($doc) {
            $doc->delete();

            return [
                "status"    => "success",
                "code"  => 200,
                "message"   => "Image deleted successfully",
            ];
        }

        return [
            "status"    => "fail",
            "code"  => 404,
            "message"   => "Image not found.",
        ];
    }

    public function profileImageUpdate($input, $type) {

        $absolutePath = "";
        if ($type == 'trainee') {
            $absolutePath = config('constants.TRAINEE_PROFILE');
        } else if ($type == 'trainer') {
            $absolutePath = config('constants.TRAINER_PROFILE');
        } else if ($type == 'admin') {
            $absolutePath = config('constants.ADMIN_PROFILE');
        }

        if ($absolutePath == "") {
            return 0;
        }

        if (!array_key_exists("file", $input)) {
            return 0;
        }

        $file = $input["file"];
        $path = Storage::disk('public')->putFile($absolutePath, $file);

        if (auth()->user()->update(["profile_image" => $path])) {
            return 'Success';
        }

        return 0;
        /*
        if ($type == 'trainee') {
            $path = public_path('assets/trainee/images/profile');
        } else if ($type == 'trainer') {
            $path = public_path('assets/trainer/images/profile');
        } else if ($type == 'admin') {
            $path = public_path('assets/admin/images/profile');
        }
        $fileName = time() . '.' . $input['file']->getClientOriginalExtension();
        if ($input['file']->move($path, $fileName)) {
            User::where('id', Auth::user()->id)->update(['profile_image' => $fileName]);
            return 'Success';
        } else {
            return 0;
        }
        */
    }

    public function coverImageUpdate($input) {

        if (!array_key_exists("file", $input)) {
            return 0;
        }

        $file = $input["file"];
        $path = Storage::disk('public')->putFile(config('constants.TRAINER_PROFILE'), $file);

        if (auth()->user()->update(["cover_image" => $path])) {
            return 'Success';
        }

        return 0;
        /*
        $path = public_path('assets/trainer/images/cover');
        $fileName = time() . '.' . $input['file']->getClientOriginalExtension();
        if ($input['file']->move($path, $fileName)) {
            User::where('id', Auth::user()->id)->update(['cover_image' => $fileName]);
            return 'Success';
        } else {
            return 0;
        }
        */
    }

    public
    function passwordUpdate($input)
    {
        $user = User::findOrFail(Auth::user()->id);
        $hashed = Hash::make($input['OldPass']);
        if (Hash::check($input['OldPass'], $user->password)) {
            $user->fill([
                'password' => Hash::make($input['confirmPass']),
            ])->save();
            return [
                'code' => 200,
                'message' => 'Password Successfully Changed'
            ];
        } else {
            return [
                'code' => 422,
                'message' => 'Current password is wrong'
            ];
        }
    }

    public
    function reviewPosted($input)
    {
        $review = new Review();
        $review->user_id = Auth::user()->id;
        $review->trainer_id = $input['trainer_id'] ?? '';
        $review->rating = $input['ratingValInput'] ?? '';
        $review->comments = $input['comments'] ?? '';
        $review->session_id = $input['session_id'] ?? '';
        $review->user_id = \auth()->user()->id ?? '';
        $review->save();
        return 'Success';
    }

    public function getReviews($trainer_id) {

        $review = Review::where('trainer_id', $trainer_id)
                        ->where("status", "approved")
                        ->with('traineeNames')
                        ->orderBy('id', 'DESC')
                        ->get();

        return $review;
    }

    public
    function reviewApprovedDisapprove($input)
    {
        if (Review::where('id', $input['id'])->update(['status' => $input['status']])) {
            return 1;
        } else {
            return 0;
        }
    }
}
