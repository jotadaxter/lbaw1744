<?php

namespace VAPOR\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Welcome extends Mailable
{
    use Queueable, SerializesModels;
    public $username;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($username)
    {
        $this->username=$username;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('vaporlbaw1744@gmail.com')
            ->view('emails.welcome');
    }
}
