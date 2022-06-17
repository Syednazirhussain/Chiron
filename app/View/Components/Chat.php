<?php

namespace App\View\Components;

use App\Repositories\MessageRepository;
use App\Repositories\UsersRepository;
use Illuminate\View\Component;

class Chat extends Component
{

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $sendTo, $messages,$userInfo;

    public function __construct($sendTo,UsersRepository  $usersRepository ,
                                MessageRepository $messageRepository)
    {
        $this->sendTo = $sendTo;
        $this->userInfo = $usersRepository->getUserbyId($this->sendTo);
//        dd($this->traineeId);
        $this->messages = $messageRepository->RequestMessagesById($this->sendTo);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $user_id = auth()->user()->id;
        return view('components.chat');
    }
}
