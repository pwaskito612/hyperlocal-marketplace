<?php

namespace App\Http\Controllers\Merchandise;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Merchandise;
use App\Models\MerchandiseImage;
use App\Http\Requests\Merchandise\InsertNewImageRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class InsertNewImageController extends Controller
{
    
    public function index(InsertNewImageRequest $request)
    {
       $data = $request->all();

       $merchandiseId = $this->checkSellerId($data['id'], Auth::user()->id);

       if($merchandiseId != null) {
        $path = $this->storeToStorage($request->file('image'));
        $this->insertDB($merchandiseId->id, $path);
       }

        return redirect('/edit-merchandise-image?id=' . $data['id']);
    }

    public function checkSellerId($merchandiseId,$sellerId) {
        $result = Merchandise::where('id', $merchandiseId)
        ->where('seller_id', $sellerId)
        ->select('id')
        ->first();

        return $result;
    }

    public function insertDB($id, $path) {

        MerchandiseImage::insert([
            "merchandise_id" => $id,
            'image_url' => $path
        ]);

    }
    
    public function storeToStorage($file) {
        $path = $file->store('/public/assets/MerchandisePicture');
        $path2 = explode('/', $path);

        return  '/storage/'.$path2[1].'/'.$path2[2].'/'.$path2[3];
    }
}
