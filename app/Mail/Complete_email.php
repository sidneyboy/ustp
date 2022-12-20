<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Complete_email extends Mailable
{
    use Queueable, SerializesModels;
    public $subject, $time, $code;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $time, $code)
    {
        $this->subject = $subject;
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
        return $this->markdown('complete_email');
    }
}
