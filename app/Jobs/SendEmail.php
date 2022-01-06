<?php

namespace App\Jobs;

use App\Mail\ContactForm;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $mails;
    public function __construct($mails)
    {
        $this->mails = $mails;
        //$this->emails = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // $email = New ContactForm( $this->email);
        // Mail::to($this->mails->contact)->send($email);
        Mail::to('test@yahoo.com')->send(New ContactForm($this->mails));
    }
}
