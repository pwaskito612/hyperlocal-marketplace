<?php

namespace App\Http\Controllers\MyMerchandise;

use Illuminate\Http\Request;
use App\Models\Merchandise;
use App\Http\Requests\OnlyIdRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DeleteController extends Controller
{
    
   

    public function index(OnlyIdRequest $request)
    {
        $data = $request->all();

       $delete = Merchandise::where('id', $data['id'])
       ->update(['deleted' => 1]);

       
        return redirect('/mymerchandise');
    }

   
}
