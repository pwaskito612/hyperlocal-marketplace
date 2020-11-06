<?php

namespace App\Http\Controllers\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Merchandise;
use App\Http\Requests\Order\BeforeOrderingRequest;
  

class CreateOrderController extends Controller
{
    public function index(BeforeOrderingRequest $request)
    {
        $data = $request->all();
        
        return view('layouts.Order.createorder', [
            'quantity' => $data['quantity'],
            'item' => Merchandise::where('id', $data['id'])->first()
        ]);
    }
}
