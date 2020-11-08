<?php 

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Account\ProfilRequest;

class UpdateProfilController extends Controller
{
    
    private $data;

    public function index(ProfilRequest $request)
    {
        $this->data = $request->all();

        if( $request->file('image') !== null ){

            //store new image to storage
            $this->storeImg($request->file('image'));

            //update database from user iput
            $update = User::where('id', Auth::user()->id)
                ->update([
                    'name' => $this->data['name'],
                    'image_url' => $this->data['image_url']
                    ]);

            
             return redirect ('/profil');                
        }
         
        $update = User::where('id', Auth::user()->id)
                ->update([
                    'name' => $this->data['name'],
                ]);

        return redirect ('/profil');
        
    }

    public function storeImg($image) {

        //delete previous profi pitc
        if(Auth::user()->image_url != '/images/user/default.png'){

            $getOldPath1 = explode('/', Auth::user()->image_url);
            $getOldPath2 = 'app/public/assets/ProfilPicture/' . $getOldPath1[4];
            $delete = unlink(storage_path($getOldPath2));

        }
        //store new profil pict
        $path = $image->store('/public/assets/ProfilPicture');
        $path2 = explode('/', $path);
        $this->data['image_url'] = '/storage/'.$path2[1].'/'.$path2[2].'/'.$path2[3];
  
    }
}
