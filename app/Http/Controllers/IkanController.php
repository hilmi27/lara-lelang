<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ikan;

use Illuminate\Support\Str;

use App\Lelang;

use App\Jenisikan;

use App\Wilayah;

use Carbon\Carbon;

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
        $ikans = Ikan::sum('qty');
        $hargas = Ikan::sum('harga');
        return view('admin.ikan.index',compact('ikan','ikans','hargas'));
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
        $ikan->qty_awal           = $request->qty;
        $ikan->qty                  = $request->qty;
        $ikan->harga                = $request->harga;
        $ikan->tgl_masuk            = $request->tgl_masuk;
        $ikan->wilayah_penangkapan  = $request->wilayah_penangkapan;
        
        if ($file = $request->file('photo')) 
        {      
           $name = "Ikan-".time().$file->getClientOriginalName();
           $file->move('admin/ikan',$name);           
           $ikan['photo'] = $name;
       
        }   

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
        
        if ($file = $request->file('photo')) 
        {      
           $name = "Ikan-".time().$file->getClientOriginalName();
           $file->move('admin/ikan',$name);           
           $ikan['photo'] = $name;
       
        }   

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

    public function lelang($id){
        $lelang = Ikan::findOrFail($id);

        return view ('admin.ikan.lelang',compact('lelang'));
    }

    public function lelangstore(Request $request){
        \Validator::make($request->all(), [
            "title" => "required",
            "photo" => "required",
            "jenis_ikan" => "required",
            "kualitas" => "required",
            "ukuran" => "required",
            "qty" => "required",
            "harga_awal" => "required",
            "tgl_lelang" => "required",
            "detail" => "required",     
            "status" => "required",     
        ])->validate();

        $id_ikan = $request->id_ikan;

        $lelang = new Lelang();
        $lelang->title = $request->title;
        $lelang->id_ikan = $id_ikan;
        $lelang->jenis_ikan = $request->jenis_ikan;
        $lelang->slug = Str::slug($request->title);
        $lelang->kualitas = $request->kualitas;
        $lelang->ukuran = $request->ukuran;
        $lelang->qty = $request->qty;
        $lelang->detail = $request->detail;
        $lelang->harga_awal = $request->harga_awal;
        $lelang->tgl_lelang = $request->tgl_lelang;
        $lelang->status = $request->status;

        if ($file = $request->file('photo')) 
        {      
           $name = "Lelang-".time().$file->getClientOriginalName();
           $file->move('admin/lelang',$name);           
           $lelang['photo'] = $name;
       
        }   

        if ($lelang->save()) {

            $lelang_ = Lelang::where('id_ikan', $id_ikan)->get()->sum('qty');
            $ikan = Ikan::find($id_ikan);
            $substract = intval($ikan->qty - $lelang_);
            $ikan->qty = $substract;
            $ikan->save();

            return redirect()->route('admin.lelang')->with('success','Data lelang berhasil ditambahkan');
    
        } else {
    
            return redirect()->back()->with('error','Data gagal ditambahkan');
    
        }
    }

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
