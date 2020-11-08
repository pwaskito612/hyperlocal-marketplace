<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Requests\Account\PasswordRequest;

class ChangePasswordController extends Controller
{
    
    public function index(PasswordRequest $request)
    {
      $data = $request->all();

      if( Hash::check($data['current-password'], Auth::user()->password) &&   
            $data['new-password'] == $data['confirm-password'] ) {
        
            $update = User::where('id', Auth::user()->id)
            ->take(1)
            ->update([
                'password' => Hash::make($data['new-password'])
            ]);

        $request->session()->put('passwordChanged', true);
      
    }
      else {
        $request->session()->put('wrongPassword', true);
      }
      
      return redirect('/profil');
    }
}
