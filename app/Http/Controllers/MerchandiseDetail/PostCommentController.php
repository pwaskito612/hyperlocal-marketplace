<?php

namespace App\Http\Controllers\MerchandiseDetail;

use Illuminate\Http\Request;
use App\Http\Requests\MerchandiseDetail\PostCommentRequest;
use App\Http\Controllers\Controller;
use App\Models\Merchandise;
use App\Models\MerchandiseImage;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostCommentController extends Controller
{
    public function index(PostCommentRequest $request)
    {
        $data = $request->all();

        Comment::insert([
            'merchandise_id' => $data['merchandise_id'],
            'user_id' =>  Auth::user()->id,
            'comment' =>   $data['comment']
        ]);

        return redirect('/merchandise-detail?id='. $data['merchandise_id']);
    }
    
}
