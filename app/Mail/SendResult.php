<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendResult extends Mailable
{
    use Queueable, SerializesModels;

    public $user,$upd_form,$status;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$upd_form,$status)
    {
        $this->user = $user;
        $this->upd_form = $upd_form;
        if ($upd_form->approved == 1) {
            $this->$status = 'อนุมัติ';
        }else{
            $this->$status = 'ไม่อนุมัติ';
        }
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = '<Auto-Generate> Result leave form';

        return $this->subject($subject)->markdown('mail.send-result');
    }
}