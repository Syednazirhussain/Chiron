<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TrainerSignUpConfirmation extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $confirmation_code;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($code)
    {
        $this->confirmation_code = $code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.name'))
                    ->subject('Please verify your email')
                    ->view('email.confirmation');
                    // ->with([
                    //     "confirmation_code" => $this->confirmation_code 
                    // ]);
    }
}
