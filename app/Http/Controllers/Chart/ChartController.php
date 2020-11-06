<?php

namespace App\Http\Controllers\Chart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Chart;
use Illuminate\Support\Facades\DB;
use App\Http\Traits\PaginationTrait;

class ChartController extends Controller
{
    use PaginationTrait;

    public function index(Request $request)
    {
        $merchandise = $this->getChart();
        $merchandise = $this->createPagination($merchandise, $request, 16);

        return view('layouts.Chart.chart',[
            'merchandises' => $merchandise
        ]);
    }

    public function getChart () {
            $getChart = DB::select('
            SELECT *
                FROM (
                    select merchandises.id,
                    title,
                    price, 
                    stock,
                    weight,
                    location,
                    categories,
                    merchandise_images.image_url,
                    ( select count(*)
                                from rating_merchandise
                                where merchandises.id = rating_merchandise.merchandise_id)
                                as total,
                                (select AVG(rate)
                                from rating_merchandise
                                where merchandises.id = rating_merchandise.merchandise_id
                               )
                                as rate,
                                ROW_NUMBER() OVER(PARTITION BY merchandises.id ORDER BY ID ASC) rn
                    from merchandises
                    inner join merchandise_images
                                on merchandises.id = merchandise_images.merchandise_id
                                inner join chart
                                on merchandises.id = chart.merchandise_id           
                    where user_id =  "'.Auth::user()->id.'"
                    order by chart.id desc
                  ) a
            WHERE rn = 1
            ');

            return $getChart;
    }

}
