<?php

namespace App\Http\Controllers\Chart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Chart;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\OnlyIdRequest;

class RemoveChartController extends Controller
{
    
    public function index(OnlyIdRequest $request)
    {
        $data = $request->all();

        Chart::where('user_id', Auth::user()->id)
        ->where('merchandise_id', $data['id'])
        ->delete();

        return redirect('/merchandise-detail?id='. $data['id']);

    }

}
