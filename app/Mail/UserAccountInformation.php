<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserAccountInformation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var string
     */
    protected $username = '';

    /**
     * @var string
     */
    protected $password = '';

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($username = '', $password = '')
    {
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.user.account.information', [
            'username' => $this->username,
            'password' => $this->password,
        ]);
    }
}
