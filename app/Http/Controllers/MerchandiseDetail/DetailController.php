<?php

namespace App\Http\Controllers\MerchandiseDetail;

use Illuminate\Http\Request;
use App\Http\Requests\OnlyIdRequest;
use App\Http\Controllers\Controller;
use App\Models\Merchandise;
use App\Models\MerchandiseImage;
use App\Models\Comment;
use App\Models\Chart;
use App\Models\Transaction;
use App\Models\MerchandiseRating;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    public function index(OnlyIdRequest $request)
    {
       $item = $request->all(); 

        return view('layouts.MerchandiseDetail.merchandisedetail',[
            'data' => $this->getData($item['id']),
            'image' => $this->getImage($item['id']),
            'comments' => $this->getComments($item['id']),
            'everBought' => $this->getEverBought($item['id']),
            'rate' => $this->getRatePrevious($item['id']),
            'chart' => $this->isInChart($item['id']),
        ]);
    }

    public function getData ($id) {
        $getData = Merchandise::where('id', $id)->first();

        return $getData;
    }

    public function getImage($id) {
        $getImage = MerchandiseImage::where('merchandise_images.merchandise_id', $id)->get();

        return $getImage;
    }

    public function getComments($merchandiseId) {
        $getComment = Comment::join('users', 
        'users.id', '=', 'comments.user_id')
        ->select('users.name', 'comments.created_at', 'comments.comment', 'users.image_url')
        ->where('merchandise_id', $merchandiseId)
        ->paginate(10);

        return $getComment;
    }

    public function getEverBought ($merchandiseId) {
        $getData = null;
        
        if(Auth::check()) {
            $getData = Transaction::where('merchandise_id', $merchandiseId)
            ->where('buyer_id', Auth::user()->id)
            ->where('confirmed','!=', null)
            ->select('id')
            ->first();
        }

        return $getData;
    }

    public function getRatePrevious ($merchandiseId) {
        $getRate= null;

        if (Auth::check()) {
            $getRate = MerchandiseRating::where('merchandise_id', $merchandiseId)
            ->where('assessor_id', Auth::user()->id)
            ->select('rate')
            ->first();
        }
        return $getRate;
    }

    public function isInChart ($id) {
        $check = null;

        if(Auth::check()) {
            $check = Chart::select('id')
            ->where('user_id', Auth::user()->id)
            ->where('merchandise_id', $id)
            ->first();
        }

        return $check;
    }

}
