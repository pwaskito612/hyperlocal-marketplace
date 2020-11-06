<?php

namespace App\Http\Controllers\MerchandiseDetail;

use Illuminate\Http\Request;
use App\Http\Requests\MerchandiseDetail\PostCommentRequest;
use App\Http\Controllers\Controller;
use App\Models\Merchandise;
use App\Models\MerchandiseRating;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\MerchandiseDetail\StoreAssessmentRequest;

class StoreAssessmentController extends Controller
{
    public function index(StoreAssessmentRequest $request)
    {
        $data = $request->all();

        MerchandiseRating::updateOrCreate([
            'merchandise_id' => $data['id'],
            'assessor_id' => Auth::user()->id
            ],
            [
            'rate' => $data['rate']
            ]
        );

        return redirect('/merchandise-detail?id='. $data['id']);
    }
    
}
