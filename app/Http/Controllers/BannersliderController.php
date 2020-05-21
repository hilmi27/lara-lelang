<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Bannerslider;

class BannersliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Bannerslider::orderBy('id','desc')->get();

        return view('admin.banner.index',compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
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
            "photo"=> "required",
              
        ])->validate();

        $banner = new Bannerslider();
        
        $banner->title = $request->title;
        $banner->note = $request->note;
        $banner->link = $request->link;

  
        if ($file = $request->file('photo')) 
        {      
           $name = "banner-".time().$file->getClientOriginalName();
           $file->move('admin/banner',$name);           
           $banner['photo'] = $name;
       }   

        if ($banner->save()) {

            return redirect()->route('admin.banner')->with('success','Data banner berhasil ditambahkan');
    
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
        $banner = Bannerslider::findOrFail($id);

        return view('admin.banner.edit',compact('banner'));
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
        //     "photo"=> "required",   
        // ])->validate();

        $banner = Bannerslider::findOrFail($id);
        
        $banner->title = $request->title;
        $banner->note = $request->note;
        $banner->link = $request->link;
       
       if ($file = $request->file('photo')) 

       {              

            $name = "banner-".time().$file->getClientOriginalName();

            $file->move('admin/banner',$name);   

            if($banner->photo != null)
            {
               if (file_exists(public_path().'admin/banner/'.$banner->photo)) {
                   unlink(public_path().'admin/banner/'.$banner->photo);
               }
            }           

           $banner['photo'] = $name;

       } 

    //    dd($banner);

        if ($banner->save()) {

            return redirect()->route('admin.banner')->with('success','Data banner berhasil diperbarui');
    
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
        $banner = Bannerslider::findOrFail($id);
        
        $banner->delete();

       return redirect()->route('admin.banner')->with('success','Data banner berhasil dihapus');
    }
}
