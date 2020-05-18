<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Mail;

use App\Mail\UserAcceptMail;

use App\Mail\UserRejectMail;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::orderBy('id','desc')->get();

        return view('admin.user.index',compact('user'));
    }

    public function submission(){
        $user = User::where('status','=','Submission')->orderBy('id','desc')->get();

        return view('admin.user.submission',compact('user'));
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
        //
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
        $user = User::findOrFail($id);

        return view('admin.user.edit',compact('user'));
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
            "status" => "required",       
        ]
        ,[
            "status.required" => "Status tidak boleh kosong."
        ]
        )->validate();
        
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->no_hp = $request->no_hp;
        $user->no_ktp = $request->no_ktp;
        $user->alamat = $request->alamat;
        $user->unit_kerja = $request->unit_kerja;
        $user->lok_simpanan = $request->lok_simpanan;
        $user->password = Hash::make($request->password);
        $user->status = $request->status;

        if ($user->status == 'Actived') {
            Mail::to($request->email)->send(new UserAcceptMail());
        }
        if ($user->status == 'Nonactived') {
            Mail::to($request->email)->send(new UserRejectMail());
        }

        if ($user->save()) {
            return redirect()->route('admin.user')->with('success','Data user berhasil diperbarui');
        } else {
            return redirect()->back()->with('error','Data user gagal diperbarui');
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
        $user = User::findOrFail($id);

        if ($user->delete()) {

            return redirect()->route('admin.user')->with('success','Data user berhasil dipindahkan ke trash');
    
        } else {
    
            return redirect()->back()->with('error','Data gagal diupdate');
    
        }

    }

    public function trash(){

        $user = User::onlyTrashed()->get();

        return view('admin.user.trash', compact('user'));
    }

    public function restore($id) {
        $user = User::withTrashed()->findOrFail($id);

        if ($user->trashed()) {
            $user->restore();
            return redirect()->route('admin.user.trash')->with('success','User successfully restored');
        }else {
            return redirect()->route('admin.user.trash')->with('error','User is not in trash');
        }
    }

    public function deletePermanent($id){
        
        $user = User::withTrashed()->findOrFail($id);

        if (!$user->trashed()) {
        
            return redirect()->route('admin.user.trash')->with('error','User is not in trash');
        
        }else {
        
            $user->forceDelete();

            return redirect()->route('admin.user.trash')->with('success','User permanently deleted');
        }
    }
}
