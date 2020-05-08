<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Bannerslider;

class FrontController extends Controller
{
    public function __construct()
    {
        
    }

    public function home(){
        $banner = Bannerslider::all();
        return view('front.home',compact('banner'));
    }
}
