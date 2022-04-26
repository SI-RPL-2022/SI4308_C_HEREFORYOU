<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Slider;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.home',[
            'title' => 'Home'
        ]);
    }
}
