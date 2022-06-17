<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Models\TrainingSessions;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TrainerAppointmentRescheduled extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $trainingSession;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(TrainingSessions $trainingSession)
    {
        $this->trainingSession = $trainingSession;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.name'))
                    ->subject("Appointment Reschedule")
                    ->view('email.trainer.appointment_reschedule')
                    ->with([ "session" => $this->trainingSession ]);
    }
}
