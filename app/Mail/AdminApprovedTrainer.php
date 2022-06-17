<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminApprovedTrainer extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $trainer;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $trainer)
    {
        $this->trainer = $trainer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.name'))
                    ->subject("Account Approved")
                    ->view('email.trainer.account_approved')
                    ->with([ "trainer" => $this->trainer ]);
    }
}
