<?php

namespace App\Http\Controllers\SearchResult;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Search\SearchRequest;

class ResultController extends Controller
{
    
    public function index(SearchRequest $request)
    {
        $data = $request->all();
 
        $merchandise = app("App\Http\Controllers\SearchResult\\".$data['sort']. "Controller")
        ->index($data, $request);

        return view('layouts.SearchResult.searchresult', [
            'merchandise' => $merchandise
        ]);
    }

}
