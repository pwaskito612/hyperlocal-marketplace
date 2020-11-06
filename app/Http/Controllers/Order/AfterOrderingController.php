<?php

namespace App\Http\Controllers\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AfterOrderingController extends Controller
{
   
    public function index()
    {
        return view('layouts.Order.afterorder');
    }
}
