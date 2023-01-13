<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Send_to_chairman_mail extends Mailable
{
    use Queueable, SerializesModels;
    public $subject,$number;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject,$number)
    {
        $this->subject = $subject;
        $this->number = $number;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('send_to_chairman_mail');
    }
}
