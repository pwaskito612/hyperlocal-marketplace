<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Mail\LinkChangeEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Account\EmailRequest;
use Illuminate\Support\Facades\Crypt;

class VerifyEmailController extends Controller
{
    
    private $email;

    public function index($id, $encrypt)
    {
        $this->getEmail($id);

        //check email whether it belongs to the user based on id
        if (Crypt::decryptString($encrypt) == $this->email->email) {
            $this->updateDB($id);
        
            return redirect('/');
        }
    }

    public function getEmail ($id) {
        $this->email = User::where('id', $id)->first();
    }

    public function  updateDB ($id) {
        
        $update = User::where('id', Auth::user()->id )
        ->update([
            'email_verified_at' => date('y-m-d')
         ]);

    }
    
}
