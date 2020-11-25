<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserActivation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(\App\Model\UserActivation $data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('mobileworld.oscar@gmail.com')
            ->subject("Kích hoạt tài khoản")
            ->view('home.mail.email_user_activation')
            ->with('data', $this->data);
    }
}
