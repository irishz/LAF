<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendApprove extends Mailable
{
    use Queueable, SerializesModels;

    public $approve_mail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($approve_mail)
    {
        $this->approve_mail = $approve_mail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.send-approve');
    }
}
