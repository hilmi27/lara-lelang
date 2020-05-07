<?php

namespace App\Http\Controllers;

use App\Nelayan;

use Illuminate\Http\Request;

use Illuminate\Validation\Rule;

class NelayanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nelayan = Nelayan::orderBy('id','desc')->get();
        return view('admin.nelayan.index',compact('nelayan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.nelayan.create');
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
            "nama" => "required",
            "alamat" => "required|min:10",
            "no_ktp" => "required|min:10",
            "no_hp" => "required|min:10",
            "nama_kapal" => "required",          
        ])->validate();

        $nelayan                = new Nelayan();
        $nelayan->nama          = $request->nama;
        $nelayan->alamat        = $request->alamat;
        $nelayan->no_ktp        = $request->no_ktp;
        $nelayan->email         = $request->email;
        $nelayan->no_hp         = $request->no_hp;
        $nelayan->nama_kapal    = $request->nama_kapal;
          
        if ($nelayan->save()) {

            return redirect()->route('admin.nelayan')->with('success','Data nelayan berhasil ditambahkan');
    
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
        $nelayan = Nelayan::findOrFail($id);
        
        return view('admin.nelayan.edit',compact('nelayan'));
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
            "nama" => "required",
            "alamat" => "required|min:10",
            "no_ktp" => "required|min:10",
            "no_hp" => "required|min:10",
            "nama_kapal" => "required",          
        ])->validate();

        $nelayan                = Nelayan::findOrFail($id);
        $nelayan->nama          = $request->nama;
        $nelayan->alamat        = $request->alamat;
        $nelayan->no_ktp        = $request->no_ktp;
        $nelayan->email         = $request->email;
        $nelayan->no_hp         = $request->no_hp;
        $nelayan->nama_kapal    = $request->nama_kapal;
          
        if ($nelayan->save()) {

            return redirect()->route('admin.nelayan')->with('success','Data nelayan berhasil diupdate');
    
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
        $nelayan = Nelayan::findOrFail($id);

        if ($nelayan->delete()) {

            return redirect()->route('admin.nelayan')->with('success','Data nelayan berhasil dipindahkan ke trash');
    
        } else {
    
            return redirect()->back()->with('error','Data gagal diupdate');
    
        }

    }

    public function trash(){

        $nelayan = Nelayan::onlyTrashed()->paginate(10);

        return view('admin.nelayan.trash', compact('nelayan'));
    }

    public function restore($id) {
        $nelayan = Nelayan::withTrashed()->findOrFail($id);

        if ($nelayan->trashed()) {
            $nelayan->restore();
            return redirect()->route('admin.nelayan.trash')->with('success','Nelayan successfully restored');
        }else {
            return redirect()->route('admin.nelayan.trash')->with('error','Nelayan is not in trash');
        }
    }

    public function deletePermanent($id){
        
        $nelayan = Nelayan::withTrashed()->findOrFail($id);

        if (!$nelayan->trashed()) {
        
            return redirect()->route('admin.nelayan.trash')->with('error','Nelayan is not in trash');
        
        }else {
        
            $nelayan->forceDelete();

            return redirect()->route('admin.nelayan.trash')->with('success','Nelayan permanently deleted');
        }
    }


}
