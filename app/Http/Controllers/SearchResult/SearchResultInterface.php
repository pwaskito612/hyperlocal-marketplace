<?php

namespace App\Http\Controllers\SearchResult;


interface SearchResultInterface {

    public function getResult($search, $location);

}