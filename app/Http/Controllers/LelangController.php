<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Lelang;

use App\Jenisikan;

use App\Bid;

use App\Ikan;

use Mail;

use App\Mail\SetPemenangMail;

use Illuminate\Support\Str;

class LelangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lelang = Lelang::orderBy('id','desc')->get();

        return view('admin.lelang.index',compact('lelang'));
        // echo 'test';
    }

    public function onprogress(){
        $lelang = Lelang::where('status','=','on progress')->orderBy('id','desc')->get();

        return view('admin.lelang.onprogress',compact('lelang'));
    }

    public function done(){
        $lelang = Lelang::where('status','=','done')->orderBy('id','desc')->get();

        return view('admin.lelang.done',compact('lelang'));
    }

    public function cancel(){
        $lelang = Lelang::where('status','=','cancel')->orderBy('id','desc')->get();

        return view('admin.lelang.cancel',compact('lelang'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis   = Jenisikan::all();

        return view('admin.lelang.create',compact('jenis'));
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

        $lelang = new Lelang();
        $lelang->title = $request->title;
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

        // dd($lelang);
        if ($lelang->save()) {

            return redirect()->route('admin.lelang')->with('success','Data lelang berhasil ditambahkan');
    
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
        $lelang = Lelang::findOrFail($id);

        $bid = Bid::where('id_lelang','=', $id)->orderBy('bid','desc')->get();
        return view('admin.lelang.show',compact('lelang','bid'));
    }

    public function setpemenang(Request $request, $id)
    {
        $lelang                 = Lelang::findOrFail($id);

        $lelang->pemenang       = $request->pemenang;

        $lelang->harga_akhir    = $request->harga_akhir;

        // dd($lelang);
        if ($lelang->save()) {

            $lelang->status = 'done';

            $lelang->save();

            Mail::to($request->emailpemenang)->send(new SetPemenangMail());

            return redirect()->route('admin.lelang')->with('success','Pemenang lelang no. '.$id.' telah ditentukan');
    
        } else {
    
            return redirect()->back()->with('error','Pememang gagal ditambahkan');
    
        }
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenis   = Jenisikan::all();

        $lelang = Lelang::findOrFail($id);

        // dd($lelang);
        return view('admin.lelang.edit',compact('lelang','jenis'));
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
        // \Validator::make($request->all(), [
        //     "title" => "required",
        //     "photo" => "required",
        //     "jenis_ikan" => "required",
        //     "kualitas" => "required",
        //     "ukuran" => "required",
        //     "qty" => "required",
        //     "harga_awal" => "required",
        //     "tgl_lelang" => "required",
        //     "detail" => "required",     
        //     "status" => "required",     
        // ])->validate();

        $id_ikan = $request->id_ikan;

        $lelang             = Lelang::findOrFail($id);
        $lelang->title      = $request->title;
        $lelang->jenis_ikan = $request->jenis_ikan;
        $lelang->slug       = Str::slug($request->title);
        $lelang->kualitas   = $request->kualitas;
        $lelang->ukuran     = $request->ukuran;
        $lelang->qty        = $request->qty;
        $lelang->detail     = $request->detail;
        $lelang->harga_awal = $request->harga_awal;
        $lelang->tgl_lelang = $request->tgl_lelang;
        $lelang->status     = $request->status;

        if ($file = $request->file('photo')) 
        {      
           $name = "Lelang-".time().$file->getClientOriginalName();
           $file->move('admin/lelang',$name);           
           $lelang['photo'] = $name;
       
        }   

        if ($request->status == 'cancel') {
            $lelang_ = Lelang::where('id_ikan', $id_ikan)->value('qty');
            $ikan = Ikan::find($id_ikan);
            $substract = intval($ikan->qty + $lelang_);
            $ikan->qty = $substract;

            $ikan->save();
            // dd($ikan->id_ikan);
        }
        
        // dd($lelang);
        if ($lelang->save()) {

            return redirect()->route('admin.lelang')->with('success','Data lelang berhasil diupdate');
    
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
        $lelang = Lelang::findOrFail($id);

        if ($lelang->delete()) {

            return redirect()->route('admin.lelang')->with('success','Data lelang berhasil dipindahkan ke trash');
    
        } else {
    
            return redirect()->back()->with('error','Data gagal diupdate');
    
        }

    }

    public function trash(){

        $lelang = Lelang::onlyTrashed()->paginate(10);

        return view('admin.lelang.trash', compact('lelang'));
    }

    public function restore($id) {
        $lelang = Lelang::withTrashed()->findOrFail($id);

        if ($lelang->trashed()) {
            $lelang->restore();
            return redirect()->route('admin.lelang.trash')->with('success','lelang successfully restored');
        }else {
            return redirect()->route('admin.lelang.trash')->with('error','lelang is not in trash');
        }
    }

    public function deletePermanent($id){
        
        $lelang = Lelang::withTrashed()->findOrFail($id);

        if (!$lelang->trashed()) {
        
            return redirect()->route('admin.lelang.trash')->with('error','lelang is not in trash');
        
        }else {
        
            $lelang->forceDelete();

            return redirect()->route('admin.lelang.trash')->with('success','lelang permanently deleted');
        }
    }

}
