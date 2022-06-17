<?php

namespace App\View\Components;

use App\Models\Message;
use Illuminate\View\Component;

class Adminchattab extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $sendTo, $sendFrom , $messages;

    public function __construct($sendTo, $sendFrom)
    {
        $this->sendTo = $sendTo;
        $this->sendFrom = $sendFrom;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $this->messages = Message::where('send_to', $this->sendTo)
            ->orwhere('send_to', $this->sendFrom)->get();

    //    dd($messages);
        return view('components.adminchattab');
    }
}
