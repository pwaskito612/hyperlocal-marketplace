<?php

namespace App\Http\Controllers\MyMerchandise;

use Illuminate\Http\Request;
use App\Models\Merchandise;
use App\Models\MerchandiseImage;
use App\Http\Requests\OnlyIdRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EditDataController extends Controller
{
    
    public function index(OnlyIdRequest $request)
    {
        $item = $request->all();

        return view('layouts.Merchandise.editmerchandise', [
            'merchandise' => $this->getMerchandise($item['id']),
        ]);
    }

    public function getMerchandise($id) {
        $getMerchandise = Merchandise::where('id', $id)
        ->where('seller_id', Auth::user()->id)
        ->first();

        return $getMerchandise;
    }

   
   
}
