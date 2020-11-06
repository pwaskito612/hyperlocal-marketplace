<?php

namespace App\Http\Controllers\MyMerchandise;

use Illuminate\Http\Request;
use App\Models\Merchandise;
use App\Models\MerchandiseImage;
use App\Http\Requests\Merchandise\MerchandiseRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    
    private $data;

    public function index(MerchandiseRequest $request)
    {
        $this->data = $request->all();

        $this->storeMerchandise();
        $this->storeImage($request);

        return redirect('/mymerchandise');

    }

    public function storeMerchandise() {
        Merchandise::insert([
            'seller_id' => Auth::user()->id,
            'title' => $this->data['title'],
            'weight' => $this->data['weight'],
            'stock' => $this->data['stock'],
            'price' => $this->data['price'],
            'location' => $this->data['location'],
            'categories' => $this->data['categories'],
            'description' => $this->data['description'],
            'deleted' => 0
        ]);
    }

    public function storeImage($request) {
        for($i = 1; $i <=5 ; $i++) {
            if($request->file('image-' .$i) != null) {
                $image = $request->file('image-' .$i);
    
                $path = $image->store('/public/assets/MerchandisePicture');
                $path2 = explode('/', $path);
                $this->data['image_url-'.$i] = '/storage/'.$path2[1].'/'.$path2[2].'/'.$path2[3];
    
                $this->storeMerchandiseImageToDB($this->data['image_url-'.$i]);
            }
        }
    }

    public function getMerchandiseId(){
        $merchandiseId = DB::table('merchandises')
        ->select('id')
        ->where('seller_id', Auth::user()->id)
        ->orderBy('id', 'desc')
        ->first();

        return $merchandiseId->id;
    }

    public function storeMerchandiseImageToDB($path) {
        $insert = MerchandiseImage::insert([
            'merchandise_id' => $this->getMerchandiseId(),
            'image_url' => $path
        ]);  
        
    }
}
