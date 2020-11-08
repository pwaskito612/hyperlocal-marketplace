<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Mail\LinkChangeEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Account\EmailRequest;

class UpdateEmailController extends Controller
{
   

    public function index(EmailRequest $request)
    {
        $data = $request->all();

        if($data['email'] != Auth::user()->email){ 
            $this->updateDB($data['email']);
            $this->sendEmail($data['email']);
        }

        return redirect('/profil');
    }

    public function  updateDB ($email) {
        
        $update = User::where('id', Auth::user()->id)->update([
            'email' => $email,
            'email_verified_at' => null
         ]);

    }

    public function sendEmail($email) {
        Mail::to($email)->send(new LinkChangeEmail);
    }

}
