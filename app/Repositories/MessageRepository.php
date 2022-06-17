<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

//use Your Model

/**
 * Class MessageRepository.
 */
class MessageRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Message::class;
    }

    public function StoreMessageFromTrainer()
    {
        dd('StoreMessageFromTrainer');
    }


    public function RequestMessagesById($sendTo)
    {
        if (Auth::check()) {
            // auth()->user()->messages()->update([
            //     'seen' => 1
            // ]);

            Message::where('send_to',auth()->user()->id)->where('send_from',$sendTo)
            ->update([
                'seen' => 1
            ]);

            $user_role = User::where('id', $sendTo)->pluck('role_id')->first();
            if ($user_role == 3) {
                $messages = Message::where('trainee_id', $sendTo)
                    ->where('trainer_id', auth()->user()->id)
                    ->get();
            } else {
                $messages = Message::where('trainer_id', $sendTo)
                    ->where('trainee_id', auth()->user()->id)
                    ->get();
            }

            return $messages;
        }
    }

    public function storeMessage($request)
    {
        $user_id = auth()->user()->id;
        $send_to = $request->send_to;
        $send_from = $user_id;

        $role_id = User::where('id', $send_to)->pluck('role_id')->first();
        if ($role_id == 3) {
            $trainee_id = $send_to;
            $trainer_id = $send_from;
        } else {
            $trainer_id = $send_to;
            $trainee_id = $send_from;
        }
        $message = $request->message;

        $message = Message::create([
            'send_from' => $send_from,
            'send_to' => $send_to,
            'trainer_id' => $trainer_id,
            'trainee_id' => $trainee_id,
            'message' => $message,
            'created_at' => Carbon::now()
        ]);

        return $message;
    }
}
