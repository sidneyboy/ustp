<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Send_to_student extends Mailable
{
    use Queueable, SerializesModels;

    public $subject, $messages, $chair_name, $time;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $messages, $chair_name, $time)
    {
        $this->subject = $subject;
        $this->messages = $messages;
        $this->chair_name = $chair_name;
        $this->time = $time;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('send_to_student');
    }
}
