<?php

namespace App\Http\Controllers\MyMerchandise;

use Illuminate\Http\Request;
use App\Models\Merchandise;
use App\Models\MerchandiseImage;
use App\Http\Requests\Merchandise\InsertNewImageRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class InsertNewImageController extends Controller
{
    
    

    public function index(InsertNewImageRequest $request)
    {
        $data = $request->all();

        $path = $this->storeToStorage($request->file('image'));
        $this->insertDB($data['id'], $path);

        return redirect('/edit-merchandise-image?id=' . $data['id']);
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
