<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Generalsetting;

use App\Bannerslider;

use App\Lelang;

class FrontController extends Controller
{
    // public function __construct($gs)
    // {
    //    $gs = $this->Generalsetting();
    // }

    public function home(){
        $gs = Generalsetting::all();
        $banner = Bannerslider::all();
        $newlelang = Lelang::orderBy('id','desc')->where('status','=','on progress')->limit(8)->get();
        return view('front.home',compact('banner','gs','newlelang'));
    }

    public function about(){
        return view('front.about');
    }

    public function lelang(){
        $gs = Generalsetting::all();
        return view('front.lelang',compact('gs'));
    }

    public function lelangshow(){
        return view('front.lelangshow');
    }

    public function contact(){
        $gs = Generalsetting::all();
        return view('front.contact',compact('gs'));
    }

}
