<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ikan;

use App\Jenisikan;

use App\Wilayah;

class IkanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ikan = Ikan::orderBy('id','desc')->get();

        return view('admin.ikan.index',compact('ikan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis   = Jenisikan::all();
        $wilayah = Wilayah::all();
        return view('admin.ikan.create',compact('jenis','wilayah'));
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
            "jenis_ikan" => "required",
            "kualitas" => "required",
            "ukuran" => "required",
            "qty" => "required",
            "harga" => "required",
            "tgl_masuk" => "required",
            "wilayah_penangkapan" => "required",          
        ])->validate();

        $ikan                       = new Ikan();
        $ikan->jenis_ikan           = $request->jenis_ikan;
        $ikan->kualitas             = $request->kualitas;
        $ikan->ukuran               = $request->ukuran;
        $ikan->qty                  = $request->qty;
        $ikan->harga                = $request->harga;
        $ikan->tgl_masuk            = $request->tgl_masuk;
        $ikan->wilayah_penangkapan  = $request->wilayah_penangkapan;
          
        // dd($ikan);
        if ($ikan->save()) {

            return redirect()->route('admin.ikan')->with('success','Data ikan berhasil ditambahkan');
    
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
        $ikan = Ikan::findOrFail($id);

        $jenis   = Jenisikan::all();
        $wilayah = Wilayah::all();

        return view('admin.ikan.edit',compact('ikan','jenis','wilayah'));
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
            "jenis_ikan" => "required",
            "kualitas" => "required",
            "ukuran" => "required",
            "qty" => "required",
            "harga" => "required",
            "tgl_masuk" => "required",
            "wilayah_penangkapan" => "required",          
        ])->validate();

        $ikan                       = Ikan::findOrFail($id);
        $ikan->jenis_ikan           = $request->jenis_ikan;
        $ikan->kualitas             = $request->kualitas;
        $ikan->ukuran               = $request->ukuran;
        $ikan->qty                  = $request->qty;
        $ikan->harga                = $request->harga;
        $ikan->tgl_masuk            = $request->tgl_masuk;
        $ikan->wilayah_penangkapan  = $request->wilayah_penangkapan;
          
        // dd($ikan);
        if ($ikan->save()) {

            return redirect()->route('admin.ikan')->with('success','Data ikan berhasil diupdate');
    
        } else {
    
            return redirect()->back()->with('error','Data gagal diupdate');
    
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
        $ikan = Ikan::findOrFail($id);

        if ($ikan->delete()) {

            return redirect()->route('admin.ikan')->with('success','Data ikan berhasil dipindahkan ke trash');
    
        } else {
    
            return redirect()->back()->with('error','Data gagal diupdate');
    
        }

    }

    public function trash(){

        $ikan = Ikan::onlyTrashed()->paginate(10);

        return view('admin.ikan.trash', compact('ikan'));
    }

    public function restore($id) {
        $ikan = Ikan::withTrashed()->findOrFail($id);

        if ($ikan->trashed()) {
            $ikan->restore();
            return redirect()->route('admin.ikan.trash')->with('success','Ikan successfully restored');
        }else {
            return redirect()->route('admin.ikan.trash')->with('error','Ikan is not in trash');
        }
    }

    public function deletePermanent($id){
        
        $ikan = Ikan::withTrashed()->findOrFail($id);

        if (!$ikan->trashed()) {
        
            return redirect()->route('admin.ikan.trash')->with('error','Ikan is not in trash');
        
        }else {
        
            $ikan->forceDelete();

            return redirect()->route('admin.ikan.trash')->with('success','Ikan permanently deleted');
        }
    }

}
