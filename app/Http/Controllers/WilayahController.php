<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Wilayah;

class WilayahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wilayah = Wilayah::orderBy('id','desc')->get();
        return view('admin.wilayah.index',compact('wilayah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.wilayah.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $wilayah = new Wilayah();

        $wilayah->nama = $request->nama;
 
        if ($wilayah->save()) {
 
         return redirect()->route('admin.wilayah')->with('success','Data wilayah berhasil ditambahkan');
 
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
        $wilayah = Wilayah::findOrFail($id);

        return view('admin.wilayah.edit',compact('wilayah'));
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
        $wilayah = Wilayah::findOrFail($id);
        $wilayah->nama = $request->nama;

        if ($wilayah->save()) {
            return redirect()->route('admin.wilayah')->with('success','Data wilayah berhasil diupdate');
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
        $wilayah = Wilayah::findOrFail($id);
        
        $wilayah->delete();

       return redirect()->route('admin.wilayah')->with('success','Data wilayah berhasil dihapus');
    }
}
