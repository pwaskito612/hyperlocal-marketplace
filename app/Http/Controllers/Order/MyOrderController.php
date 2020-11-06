<?php

namespace App\Http\Controllers\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Merchandise;
use App\Models\MerchandiseImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Traits\PaginationTrait;

class MyOrderController extends Controller
{
    use PaginationTrait;

    public function index(Request $request)
    {
        $merchandise = $this->getMerchandises();
        $merchandise = $this->createPagination($merchandise, $request, 10);
        
        return view('layouts.Order.myorder', [
            'merchandises' => $merchandise
        ]);
    }

    public function getMerchandises() {
        $merchandise = DB::select('
        SELECT *
            FROM (
                SELECT   merchandises.id,
                        title, 
                        price, 
                        stock,
                        weight,
                        location,
                        categories,
                        Transactions.confirmed,
                        Transactions.amount,
                        merchandise_images.image_url,
                        ROW_NUMBER() OVER(PARTITION BY Transactions.id ORDER BY ID ASC) rn
                    FROM merchandises
                    inner join merchandise_images
                    on merchandises.id = merchandise_images.merchandise_id
                    inner join Transactions
                    on merchandises.id = Transactions.merchandise_id
                    where Transactions.buyer_id = '. Auth::user()->id.' 
                    order by Transactions.id desc
              ) a
        WHERE rn = 1'  
        );

        return $merchandise;
    }

}
