<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Notify_chair extends Mailable
{
    use Queueable, SerializesModels;
    public $subject,$time;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject,$time)
    {
        $this->subject = $subject;
        $this->time = $time;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('notify_chair');
    }
}
