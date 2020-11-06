<?php

namespace App\Http\Traits;

use Illuminate\Pagination\LengthAwarePaginator as Paginator;

Trait PaginationTrait
{

    public function createPagination($array, $request, $perPage)    {

        $total = count($array);
        $currentPage = $request->input("page") ?? 1;

        $startingPoint = ($currentPage * $perPage) - $perPage;

        $array = array_slice($array, $startingPoint, $perPage, true);

        return new Paginator($array, $total, $perPage, $currentPage, [
            'path' => $request->url(),
            'query' => $request->query(),
        ]);

    }
}
