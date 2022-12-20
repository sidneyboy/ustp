<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Notify_student extends Mailable
{
    use Queueable, SerializesModels;
    public $subject, $messages, $chair_name, $time,$code;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $messages, $chair_name, $time,$code)
    {
        $this->subject = $subject;
        $this->messages = $messages;
        $this->chair_name = $chair_name;
        $this->time = $time;
        $this->code = $code;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('notify_student');
    }
}
