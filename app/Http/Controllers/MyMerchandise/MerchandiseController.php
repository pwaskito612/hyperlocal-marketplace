<?php

namespace App\Http\Controllers\MyMerchandise;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Merchandise;
use App\Models\MerchandiseImage;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Traits\PaginationTrait;

class MerchandiseController extends Controller
{
    use PaginationTrait;

    public function index(Request $request)
    {

        $merchandise = $this->getMerchandises();
        $merchandise = $this->createPagination($merchandise, $request, 10);

        return view('layouts.Merchandise.mymerchandise', [
            'merchandises' => $merchandise,
            'total' => $this->getUnconfirmedTotal()
        ]);
    }

    public function getMerchandises() {
        $merchandise = DB::select('
        SELECT *
            FROM (
                SELECT  merchandises.id, 
                        title, 
                        price, 
                        stock,
                        weight,
                        location,
                        categories,
                        merchandise_images.image_url,
                        ROW_NUMBER() OVER(PARTITION BY merchandises.id ORDER BY ID ASC) rn
                    FROM merchandises
                    inner join merchandise_images
                    on merchandises.id = merchandise_images.merchandise_id
                    where deleted = 0 and seller_id = '. Auth::user()->id.'
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
