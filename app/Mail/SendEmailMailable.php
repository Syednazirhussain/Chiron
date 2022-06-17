<?php

namespace App\Mail;

use App\Models\Promotion;
use App\Models\Promotions_send;
use App\Repositories\Promotions_sendRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmailMailable extends Mailable
{
    use Queueable, SerializesModels;

    protected $promotion;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    
    public function __construct(Promotion $promotion)
    {
        $this->promotion = $promotion;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.name'))
                    ->subject("Promotion")
                    ->view('email.promotion')
                    ->with([ "promotion" => $this->promotion ]);
    }
}
