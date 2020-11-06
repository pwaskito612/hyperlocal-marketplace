<?php

namespace App\Http\Controllers\Chart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Chart;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\OnlyIdRequest;

class AddToChartController extends Controller
{
    
    public function index(OnlyIdRequest $request)
    {
        $data = $request->all();

        Chart::insert([
            'user_id' => Auth::user()->id,
            'merchandise_id' => $data['id']
        ]);

        return redirect('/merchandise-detail?id='. $data['id']);

    }

}
