<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TraineeAppointmentCancel extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $user;
    protected $refund;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $refund = false)
    {
        $this->user = $user;
        $this->refund = $refund;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.name'))
                    ->subject("Appointment Cancelled")
                    ->view('email.trainee.appointment_cancel')
                    ->with([ 
                        "user"   => $this->user, 
                        "refund" => $this->refund, 
                    ]);
    }
}
