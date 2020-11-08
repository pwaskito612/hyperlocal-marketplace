<?php

namespace App\Http\Controllers\Merchandise;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Merchandise;
use App\Models\MerchandiseImage;
use App\Http\Requests\OnlyIdRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DeleteImageController extends Controller
{

    public function index(OnlyIdRequest $request)
    {
        $data = $request->all();

        $image = $this->getDataFromDB($data['id']);
        $check = $this->checkTotalImage($image->merchandise_id);
        
        if(sizeof($check) > 1) {
            $this->deleteImage($image->image_url);
            $this->deleteDB($image->id);
        }
        
        return redirect('/edit-merchandise-image?id='. $image->merchandise_id);
    }

    public function getDataFromDB($id) {
        $image = Merchandise::join('merchandise_images',
        'merchandises.id', '=', 'merchandise_images.merchandise_id')
        ->where('merchandise_images.id', $id)
        ->where('seller_id', Auth::user()->id)
        ->select('merchandise_images.id', 'image_url', 'merchandise_images.merchandise_id')
        ->first();

        return $image;
    }

    public function checkTotalImage($merchandiseId) {
        $total = MerchandiseImage::where('merchandise_id', $merchandiseId)
        ->select('id')
        ->take(2)
        ->get();

        return $total;
    }

    public function deleteImage($path) {
            $getOldPath1 = explode('/',$path);
            $getOldPath2 = 'app/public/assets/MerchandisePicture/' . $getOldPath1[4];
            $delete = unlink(storage_path($getOldPath2));
    }

    public function deleteDB ($id) {
        MerchandiseImage::where('id', $id)->take(1)->delete();
    }

   
}
