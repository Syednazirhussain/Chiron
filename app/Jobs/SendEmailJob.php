<?php

namespace App\Jobs;

use App\Models\Promotion;
use App\Mail\SendEmailMailable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $emails;
    protected $promotion;

    public function __construct($emails, Promotion $promotion) {

        $this->emails = $emails;
        $this->promotion = $promotion;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->emails->each(function ($email) {
            Mail::to($email)->send(new SendEmailMailable($this->promotion));
        });
    }
}
