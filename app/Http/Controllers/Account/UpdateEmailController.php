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
    private $data;

    public function index(EmailRequest $request)
    {
        $this->data = $request->all();

        $this->updateDB();
        $this->sendEmail();

        return redirect('/profil');
    }

    public function  updateDB () {
        
        $update = User::where('id', Auth::user()->id)->update([
            'email' => $this->data['email'],
            'email_verified_at' => null
         ]);

    }

    public function sendEmail() {
        Mail::to($this->data['email'])->send(new LinkChangeEmail);
    }

}
