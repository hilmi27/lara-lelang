<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Generalsetting;

class GeneralsettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gs = Generalsetting::orderBy('id','desc')->get();

        return view('admin.general.index',compact('gs'));
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
        $gs = Generalsetting::findOrFail($id);

        return view('admin.general.edit',compact('gs'));
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
            "favicon"=> "required",
            "logo" => "required",
            "bg_title" => "required",
            "title" => "required|max:50",       
        ])->validate();

        $gs = Generalsetting::findOrFail($id);
        
        $gs->title = $request->title;
        $gs->address = $request->address;
        $gs->phone = $request->phone;
        $gs->email = $request->email;
        $gs->maps = $request->maps;
        $gs->footer = $request->footer;
       
       if ($file = $request->file('favicon')) 

       {              

            $name = "favicon-".time().$file->getClientOriginalName();

            $file->move('admin/gs',$name);   

            if($gs->favicon != null)
            {
               if (file_exists(public_path().'admin/gs/'.$gs->favicon)) {
                   unlink(public_path().'admin/gs/'.$gs->favicon);
               }
            }           

           $gs['favicon'] = $name;

       } 

       if ($file = $request->file('logo')) 

       {              

            $name = "logo-".time().$file->getClientOriginalName();

            $file->move('admin/gs',$name);   

            if($gs->logo != null)
            {
               if (file_exists(public_path().'admin/gs/'.$gs->logo)) {
                   unlink(public_path().'admin/gs/'.$gs->logo);
               }
            }           

           $gs['logo'] = $name;

       } 

       if ($file = $request->file('bg_title')) 

       {              

            $name = "bg_title-".time().$file->getClientOriginalName();

            $file->move('admin/gs',$name);   

            if($gs->bg_title != null)
            {
               if (file_exists(public_path().'admin/gs/'.$gs->bg_title)) {
                   unlink(public_path().'admin/gs/'.$gs->bg_title);
               }
            }           

           $gs['bg_title'] = $name;

       } 

        if ($gs->save()) {

            return redirect()->route('admin.generalsetting')->with('success','Data general berhasil diupdate');
    
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
        //
    }

}
