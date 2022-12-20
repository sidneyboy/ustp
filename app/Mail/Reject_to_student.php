<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Reject_to_student extends Mailable
{
    use Queueable, SerializesModels;
    public $subject, $accredited_to, $chair_name, $code, $time,$status;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $accredited_to, $chair_name, $code, $time,$status)
    {
        $this->subject = $subject;
        $this->accredited_to = $accredited_to;
        $this->chair_name = $chair_name;
        $this->code = $code;
        $this->time = $time;
        $this->status = $status;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('rejected_email');
    }
}
