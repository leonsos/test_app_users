<?php

namespace App\Mail;

use App\Models\Mails;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactForm extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $mails;

    public function __construct(Mails $mails)
    {
        $this->mails = $mails;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("email to:{$this->mails->contact}")
        ->replyTo($this->mails->contact,$this->mails->subject)
        ->view('emails.emailsUser');
    }
}
