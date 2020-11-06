<?php

namespace App\Http\Controllers\MyMerchandise;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateMerchandiseController extends Controller
{
    public function index()
    {
        return view('layouts.Merchandise.createmerchandise');
    }
}
