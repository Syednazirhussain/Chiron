<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TraineeBookAppointment extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $user;
    protected $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $data = [])
    {
        $this->user = $user;
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $payload = [];
        $subject = "No Subject";

        if ($this->user->role_id == 3) {

            $subject = "Booking Delivered";
            $payload = [ "user" => $this->user ];
        } else if ($this->user->role_id == 2) {

            $subject = "Request for Appointment";
            $payload = [
                "user" => $this->user, 
                "data" => $this->data
            ];
        }

        return $this->from(config('mail.from.address'), config('mail.from.name'))
                    ->subject($subject)
                    ->view('email.trainee.booking_confirmation')
                    ->with($payload);
    }
}
