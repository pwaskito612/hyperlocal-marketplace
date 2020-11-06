<?php

namespace App\Http\Controllers\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Merchandise;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Checkout\BeforeCheckoutRequest;
use App\Http\Requests\Order\OrderRequest;
  

class StoreOrderController extends Controller
{
    public function index(OrderRequest $request)
    {
        $data = $request->all();


        $item = $this->getMerchandise($data['id']);

        $this->store($item->id, $item->seller_id, $data['amount'],
                    $data['phone_number'], $data['address']);


        return redirect('/after-ordering');   
    }

    public function getMerchandise($id) {
        $merchandise = Merchandise::where('id', $id)->first();

        return $merchandise;
    }

    public function store($merchandiseId, $sellerId, $ammount, $phone, $address) {
        Transaction::insert([
            'merchandise_id' => $merchandiseId,
            'seller_id' => $sellerId,  
            'amount' => $ammount,
            'buyer_phone' => $phone,
            'buyer_address' => $address,
            'date' => date('Y-m-d H:i:s'),
            'buyer_id' => Auth::user()->id
        ]);
    }
   
}
