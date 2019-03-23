<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendApprove extends Mailable
{
    use Queueable, SerializesModels;

    public $user,$form;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$form)
    {
        $this->user = $user;
        $this->form = $form;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = '<Auto-Generate> Approve leave application form';

        return $this->subject($subject)->markdown('mail.send-approve');
    }
}
