<?php

namespace App\Http\Controllers\SearchResult;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Traits\PaginationTrait;

class OrderByRateController extends Controller implements SearchResultInterface
{
    use PaginationTrait;
    
    public function index($data, $request)
    {
        $data = $request->all();

        $merchandise = $this->getResult($data['search'], $data['location']);
        $merchandise = $this->createPagination($merchandise, $request, 10);    

        return $merchandise;

    }

    
    public function getResult($search, $location) {
        $getResult = DB::select('
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
                where title regexp  "'.$search.'" and
                location regexp "'.$location.'"
                order by rate desc
              ) a
        WHERE rn = 1
        ');

        return $getResult;
    }

}
