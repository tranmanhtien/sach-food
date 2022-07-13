<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $arrCart;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($arrCart)
    {
        $this->arrCart = $arrCart;
        Log::info($arrCart);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.cart_confirm')
            ->with(['arrCart' => $this->arrCart]);
    }
}
