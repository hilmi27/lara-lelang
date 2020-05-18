<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Bid;

use Auth;

use Mail;

use App\Admin;

use App\Mail\UserBidMail;

class BidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $operator = Admin::where('role','=','Operator')->get();
        $bid = new Bid();
        $bid->id_lelang = $request->id_lelang;
        $bid->id_user = Auth::user()->id;
        $bid->bid = $request->bid;

        // dd($operator);
        if ($bid->save()) {

            foreach ($operator as $operator ) {
            
            Mail::to($operator->email)->send(new UserBidMail());
            
        }

            return redirect()->back()->with('success','Penawaran berhasil ditambahkan');
        
        } else {
        
            return redirect()->back()->with('error','Penawaran gagal ditambahkan');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
