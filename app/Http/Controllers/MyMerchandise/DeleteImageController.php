<?php

namespace App\Http\Controllers\MyMerchandise;

use Illuminate\Http\Request;
use App\Models\Merchandise;
use App\Models\MerchandiseImage;
use App\Http\Requests\OnlyIdRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DeleteImageController extends Controller
{
    private $data;

    public function index(OnlyIdRequest $request)
    {
        $this->data = $request->all();

        $image = $this->getDataFromDB($this->data['id']);
      
        $this->deleteImage($image->image_url);
        $this->deleteDB($image->id);
        
        return redirect('/mymerchandise');
    }

    public function getDataFromDB($id) {
        $image = Merchandise::join('merchandise_images',
        'merchandises.id', '=', 'merchandise_images.merchandise_id')
        ->where('merchandise_images.id', $id)
        ->where('seller_id', Auth::user()->id)
        ->first();

        return $image;
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
