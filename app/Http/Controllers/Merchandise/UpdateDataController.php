<?php

namespace App\Http\Controllers\Merchandise;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Merchandise;
use App\Http\Requests\Merchandise\EditDataMerchandiseRequest;
use Illuminate\Support\Facades\Auth;

class UpdateDataController extends Controller
{
    
   

    public function index(EditDataMerchandiseRequest $request)
    {
        $data = $request->all();
       
        $this->updateMerchandise($data);


        return redirect('/mymerchandise');

    }

    public function updateMerchandise($data) {
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
