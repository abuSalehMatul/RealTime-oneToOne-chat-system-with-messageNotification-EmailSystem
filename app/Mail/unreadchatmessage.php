<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use App\Message;
class unreadchatmessage extends Mailable
{
    use Queueable, SerializesModels;

     public $msg;
    public function __construct(Message $message)
    {
       $this->msg=$message;
    }

    // public function __construct()
    // {
        
    // }

   
    public function build()
    {
        return $this->from('matulprojectpushernew@gmail.com')
                    ->view('email.toClient');
    }
}
