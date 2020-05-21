<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Jenisikan;

use PDF;

class JenisikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenisikan = Jenisikan::orderBy('id','desc')->get();
        return view('admin.jenisikan.index',compact('jenisikan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jenisikan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $jenisikan = new Jenisikan();

       $jenisikan->name = $request->name;

    //    dd($jenisikan);
       if ($jenisikan->save()) {

        return redirect()->route('admin.jenisikan')->with('success','Data jenis ikan berhasil ditambahkan');

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
        $jenisikan = Jenisikan::findOrFail($id);
        return view('admin.jenisikan.edit',compact('jenisikan'));
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
        $jenisikan = Jenisikan::findOrFail($id);
        $jenisikan->name = $request->name;

        if ($jenisikan->save()) {
            return redirect()->route('admin.jenisikan')->with('success','Data jenis ikan berhasil diperbarui');
        } else {
            return redirect()->back()->with('error','Data gagal diperbarui');
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
        $jenisikan = Jenisikan::findOrFail($id);
        
        $jenisikan->delete();

       return redirect()->route('admin.jenisikan')->with('success','Data jenis ikan berhasil dihapus');
    }

}
