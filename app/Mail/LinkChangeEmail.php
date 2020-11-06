<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class LinkChangeEmail extends Mailable
{
    use Queueable, SerializesModels;


    private $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->email = DB::table('users')
        ->where('id', Auth::user()->id)
        ->first();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('example@laravel.com')
        ->view('mail.notifychangeemail',[
            'link' => url('account/verify/email/'. Auth::user()->id .'/'.  Crypt::encryptString($this->email->email)) 
        ]);
    }
}
