<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Email;
use Illuminate\Mail\Mailer;
use Mail;
use App\Mail\Newsletter;
use App\NewsletterSubscriber;


class SendNewsletterEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public $email;
    
    public function __construct(Email $email)
    {
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $subscribers = NewsletterSubscriber::get();

            foreach($subscribers as $subscriber)
            {
                Mail::to($subscriber->email)->send(new Newsletter($this->email));
            }
    }
}
