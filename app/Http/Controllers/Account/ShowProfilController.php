<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowProfilController extends Controller
{
    
    public function index(Request $request)
    {
        $wrongPassword = false;
        $passwordChanged = false;

        if( $request->session()->get('wrongPassword') == true){
            $wrongPassword = true;
            $request->session()->forget('wrongPassword');
        }

        if( $request->session()->get('passwordChanged') == true){
            $passwordChanged = true;
            $request->session()->forget('passwordChanged');
        }

        return view('layouts.Account.userprofil', [
            'wrongPassword' => $wrongPassword,
            'passwordChanged' => $passwordChanged,
        ]);

    }
}
