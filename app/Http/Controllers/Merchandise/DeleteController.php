<?php

namespace App\Http\Controllers\Merchandise;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Merchandise;
use App\Http\Requests\OnlyIdRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DeleteController extends Controller
{
   

    public function index(OnlyIdRequest $request)
    {
       $data = $request->all();

       $delete = Merchandise::where('id', $data['id'])
       ->where('seller_id', Auth::user()->id)
       ->update(['deleted' => 1]);

       
        return redirect('/mymerchandise');
    }

   
}
