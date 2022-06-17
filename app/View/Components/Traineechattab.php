<?php

namespace App\View\Components;

use App\Repositories\MessageRepository;
use App\Repositories\UsersRepository;
use Illuminate\View\Component;

class Traineechattab extends Component
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
        $this->messages = $messageRepository->RequestMessagesById($this->sendTo);
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.traineechattab');
    }
}
