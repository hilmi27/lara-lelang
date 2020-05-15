<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Generalsetting;

use App\Bannerslider;

use App\Lelang;

use App\Bid;

use App\User;

use DB;

class FrontController extends Controller
{

    public function home(){
        $gs = Generalsetting::all();
        $banner = Bannerslider::all();
        $poplelang = Lelang::orderBy('views','desc')->where('status','=','on progress')->limit(8)->get();
        $newlelang = Lelang::orderBy('id','desc')->where('status','=','on progress')->limit(8)->get();
        return view('front.home',compact('banner','gs','poplelang','newlelang'));
    }

    public function lelang(){
        $gs = Generalsetting::all();
        $lelang = Lelang::where('status','=','on progress')->orderBy('id','desc')->paginate(16);
       
        return view('front.lelang',compact('gs','lelang'));
    }

    public function lelangshow($id){


        // $lelang = Lelang::where('id', $id)->first();

        $lelang = Lelang::findOrFail($id);

        $old = $lelang->views;

        $new = $old + 1;
    
        $lelang->views = $new;
    
        $lelang->update();

        $gs = Generalsetting::all();

        $bid = Bid::where('id_lelang','=', $id)->orderBy('bid','desc')->get();

        // $bid = DB::table('bid')->join('users','bid.id_user','=','users.id')->get();

        return view('front.lelangshow',compact('lelang','gs','bid'));
    }


    public function contact(){
        $gs = Generalsetting::all();
        return view('front.contact',compact('gs'));
    }

}
