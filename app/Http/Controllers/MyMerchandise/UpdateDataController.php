<?php

namespace App\Http\Controllers\MyMerchandise;

use Illuminate\Http\Request;
use App\Models\Merchandise;
use App\Http\Requests\Merchandise\EditDataMerchandiseRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UpdateDataController extends Controller
{
    
   

    public function index(EditDataMerchandiseRequest $request)
    {
        $data = $request->all();

        $this->storeMerchandise($data);


        return redirect('/mymerchandise');

    }

    public function storeMerchandise($data) {
        Merchandise::where('id', $data['id'])
        ->where('seller_id', Auth::user()->id)
        ->update([
            'title' => $data['title'],
            'weight' => $data['weight'],
            'stock' => $data['stock'],
            'price' => $data['price'],
            'location' => $data['location'],
            'categories' => $data['categories'],
            'description' => $data['description'],
        ]);
    }

    
}
