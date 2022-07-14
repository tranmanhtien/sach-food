<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmUserMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $linkActive;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($linkActive)
    {
        //
        $this->linkActive = $linkActive;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.verify_user')
            ->with(['linkActive '=> $this->linkActive]);
    }
}
