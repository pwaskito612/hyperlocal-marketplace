<?php

namespace App\Http\Controllers\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Merchandise;
use App\Models\Transaction;
use App\Models\MerchandiseImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Traits\PaginationTrait;

class UnconfirmedOrderController extends Controller
{
    use PaginationTrait;

    public function index(Request $request)
    {
        $merchandise = $this->getMerchandises();
        $merchandise = $this->createPagination($merchandise, $request, 10);

        return view('layouts.Order.unconfirmedorder', [
            'merchandises' => $merchandise,
            'total' => $this->getUnconfirmedTotal()
        ]);
    }

    public function getMerchandises() {
        $merchandise = DB::select('
        SELECT *
            FROM (
                SELECT  Transactions.id, 
                        title, 
                        price, 
                        Transactions.amount,
                        Transactions.buyer_address,
                        Transactions.buyer_phone,  
                        merchandise_images.image_url,
                        Transactions.confirmed,
                        ROW_NUMBER() OVER(PARTITION BY  Transactions.id  ORDER BY  Transactions.id  ASC) rn
                    FROM merchandises
                    inner join merchandise_images
                    on merchandises.id = merchandise_images.merchandise_id
                    inner join Transactions
                    on merchandises.id = Transactions.merchandise_id
                    where Transactions.seller_id = '. Auth::user()->id.' 
                    and Transactions.confirmed  IS NULL
              ) a
        WHERE rn = 1'  
        );

        return $merchandise;
    }


    public function getUnconfirmedTotal() {
        $total = Transaction::where('seller_id', Auth::user()->id)
        ->where('confirmed', null)
        ->count('seller_id');

        return $total;
    }

}
