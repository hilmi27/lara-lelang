<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ikan;

use App\Lelang;

use App\User;

use App\Admin;

use App\Nelayan;

class ReportController extends Controller
{
    public function ikanprint(){
        $ikan = Ikan::orderBy('id','desc')->get();
        return view('admin.report.ikanprint',compact('ikan'));
    }

    public function lelangprint(){
        $lelang = Lelang::orderBy('id','desc')->get();

        return view('admin.report.lelangprint',compact('lelang'));
    }

    public function userprint(){
        $user = User::orderBy('id','desc')->get();

        return view('admin.report.userprint',compact('user'));
    }

    public function staffprint(){
        $staff = Admin::orderBy('id','desc')->get();

        return view('admin.report.staffprint',compact('staff'));
    }

    public function nelayanprint(){
        $nelayan = Nelayan::orderBy('id','desc')->get();

        return view('admin.report.nelayanprint',compact('nelayan'));
    }
}
