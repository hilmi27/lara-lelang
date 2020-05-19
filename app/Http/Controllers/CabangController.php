<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cabang;

class CabangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cabang = Cabang::orderBy('id','desc')->get();
        return view ('admin.cabang.index',compact('cabang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cabang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Validator::make($request->all(), [
            "name"=> "required",
            "address" => "required",
              
        ])->validate();


        $cabang = new Cabang();
        $cabang->name = $request->name;
        $cabang->address = $request->address;
        $cabang->link_maps = $request->link_maps;
        $cabang->email = $request->email;
        $cabang->phone = $request->phone;

        if ($cabang->save()) {

            return redirect()->route('admin.cabang')->with('success','Data cabang berhasil ditambahkan');
    
        } else {
    
            return redirect()->back()->with('error','Data gagal ditambahkan');
    
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
        $cabang = Cabang::findOrFail($id);
        return view('admin.cabang.edit',compact('cabang'));
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
        \Validator::make($request->all(), [
            "name"=> "required",
            "address" => "required",
              
        ])->validate();


        $cabang = Cabang::findOrFail($id);
        $cabang->name = $request->name;
        $cabang->address = $request->address;
        $cabang->link_maps = $request->link_maps;
        $cabang->email = $request->email;
        $cabang->phone = $request->phone;

        if ($cabang->save()) {

            return redirect()->route('admin.cabang')->with('success','Data cabang berhasil ditambahkan');
    
        } else {
    
            return redirect()->back()->with('error','Data gagal ditambahkan');
    
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cabang = Cabang::findOrFail($id);
        
        $cabang->delete();

       return redirect()->route('admin.cabang')->with('success','Data cabang berhasil dihapus');
    }
}
