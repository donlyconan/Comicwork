<?php

namespace App\Mail;

use App\Model\UserActivation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserForgot extends Mailable
{
    use Queueable, SerializesModels;

    private $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(UserActivation $data)
    {
        $this->data = $data;
        $this->data->str_time = date('h:m d/m/Y', time());
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('mobileworld.oscar@gmail.com')
            ->subject("Quên mật khẩu")
            ->view('home.mail.email_user_forgot')
            ->with('data', $this->data);
    }
}
