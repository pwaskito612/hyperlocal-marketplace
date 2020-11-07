<?php

namespace App\Http\Controllers\Merchandise;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MerchandiseImage;
use App\Http\Requests\OnlyIdRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EditImageController extends Controller
{
    private $id;
    
    public function index(OnlyIdRequest $request)
    {
        $item = $request->all();
        $this->id = $item['id'];
        
        return view('layouts.Merchandise.editimage', [
            'image' => $this->getImage($item['id']),
            'id' => $item['id'],
        ]);
    }

    public function getImage($id) {
        $getMerchandise = MerchandiseImage::where('merchandise_id',function ($query) {
            $query->select('id')
                ->from('merchandises')
                ->where('seller_id', Auth::user()->id)
                ->where('id', $this->id)
                ->first();
            })
            ->get();

            return $getMerchandise;
        
    }

   
   
}
