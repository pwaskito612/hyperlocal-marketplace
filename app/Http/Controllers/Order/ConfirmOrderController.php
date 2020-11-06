<?php

namespace App\Http\Controllers\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Http\Requests\OnlyIdRequest;

class ConfirmOrderController extends Controller
{
    
    public function index(OnlyIdRequest $request)
    {
        $data = $request->all();

        Transaction::where('id', $data['id'])
        ->update([
            'confirmed' => date('y-m-d')
        ]);

        return redirect('/unconfirmed-order');
    }
}
