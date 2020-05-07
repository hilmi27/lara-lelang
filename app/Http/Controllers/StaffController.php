<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use App\Admin;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = Admin::orderBy('id','desc')->get();
        return view('admin.staff.index',compact('staff'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.staff.create');
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
            "name" => "required",
            "email" => "required",
            "password" => "required",
            "unit_kerja" => "required",
            "jabatan" => "required",
            "no_pegawai" => "required",
            "role" => "required"          
        ])->validate();

        $staff                = new Admin();
        $staff->name          = $request->name;
        $staff->email         = $request->email;
        $staff->password      = Hash::make($request->password);
        $staff->unit_kerja    = $request->unit_kerja;
        $staff->jabatan       = $request->jabatan;
        $staff->no_pegawai    = $request->no_pegawai;
        $staff->role          = $request->role;
          
        if ($staff->save()) {

            return redirect()->route('admin.staff')->with('success','Data staff berhasil ditambahkan');
    
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
        $staff = Admin::findOrFail($id);

        return view('admin.staff.edit',compact('staff'));
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
            "name" => "required",
            "email" => "required",
            "password" => "required",
            "unit_kerja" => "required",
            "jabatan" => "required",
            "no_pegawai" => "required",
            "role" => "required"          
        ])->validate();

        $staff                = Admin::findOrFail($id);
        $staff->name          = $request->name;
        $staff->email         = $request->email;
        $staff->password      = Hash::make($request->password);
        $staff->unit_kerja    = $request->unit_kerja;
        $staff->jabatan       = $request->jabatan;
        $staff->no_pegawai    = $request->no_pegawai;
        $staff->role          = $request->role;
          
        if ($staff->save()) {

            return redirect()->route('admin.staff')->with('success','Data staff berhasil diupdate');
    
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
        $staff = Admin::findOrFail($id);

        if ($staff->delete()) {

            return redirect()->route('admin.staff')->with('success','Data staff berhasil dipindahkan ke trash');
    
        } else {
    
            return redirect()->back()->with('error','Data gagal diupdate');
    
        }

    }

    public function trash(){

        $staff = Admin::onlyTrashed()->get();

        return view('admin.staff.trash', compact('staff'));
    }

    public function restore($id) {
        $staff = Admin::withTrashed()->findOrFail($id);

        if ($staff->trashed()) {
            $staff->restore();
            return redirect()->route('admin.staff.trash')->with('success','Staff successfully restored');
        }else {
            return redirect()->route('admin.staff.trash')->with('error','Staff is not in trash');
        }
    }

    public function deletePermanent($id){
        
        $staff = Admin::withTrashed()->findOrFail($id);

        if (!$staff->trashed()) {
        
            return redirect()->route('admin.staff.trash')->with('error','Staff is not in trash');
        
        }else {
        
            $staff->forceDelete();

            return redirect()->route('admin.staff.trash')->with('success','Staff permanently deleted');
        }
    }
}
