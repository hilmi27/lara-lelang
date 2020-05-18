@extends('layouts.admin')
@section('style')
<style>
   .picture-container {
  position: relative;
  cursor: pointer;
  text-align: center;
}

 .picture {
  width: 800px;
  height: 400px;
  background-color: #999999;
  border: 4px solid #CCCCCC;
  color: #FFFFFF;
  /* border-radius: 50%; */
  margin: 5px auto;
  overflow: hidden;
  transition: all 0.2s;
  -webkit-transition: all 0.2s;
}

.favicon {
  width: 200px;
  height: 200px;
  background-color: #999999;
  border: 4px solid #CCCCCC;
  color: #FFFFFF;
  /* border-radius: 50%; */
  margin: 5px auto;
  overflow: hidden;
  transition: all 0.2s;
  -webkit-transition: all 0.2s;
}

.favicon input[type="file"] {
  cursor: pointer;
  display: block;
  height: 100%;
  left: 0;
  opacity: 0 !important;
  position: absolute;
  top: 0;
  width: 100%;
}

.picture:hover {
  border-color: #2ca8ff;
}
.picture input[type="file"] {
  cursor: pointer;
  display: block;
  height: 100%;
  left: 0;
  opacity: 0 !important;
  position: absolute;
  top: 0;
  width: 100%;
}
.picture-src {
  width: 100%;
  height: 100%;
}

</style>

@endsection

@section('content')

<!-- Content Header (Page header) -->

<div class="content-header">

  <div class="container-fluid">

    <div class="row mb-2">

      <div class="col-sm-6">

        <h1 class="m-0 text-dark">General Setting</h1>

      </div><!-- /.col -->

      <div class="col-sm-6">

        <ol class="breadcrumb float-sm-right">

          <li class="breadcrumb-item"><a href="#">Home</a></li>

          <li class="breadcrumb-item active">General Setting</li>

        </ol>

      </div>

    </div>

  </div>

</div>

@if(session('error'))

<div class="alert alert-danger">

  {{session('error')}}

</div>

@endif

<div class="card card-primary">

  <form role="form" action="{{ route('admin.generalsetting.update',$gs->id) }}" method="POST" enctype="multipart/form-data">

    @csrf

    <div class="card-body">

      <div class="form-group">

        <label for="favicon">Favicon</label>

        <input type="file" name="favicon" value="{{old('favicon') ? old('favicon') : $gs->favicon}}" class="form-control  {{$errors->first('favicon') ? "is-invalid" : ""}}" id="favicon" placeholder="Masukkan favicon">

        <input type="hidden" name="favicon" value="{{ asset('admin/gs/'.$gs->favicon) }}">

        <div class="invalid-feedback">

            {{$errors->first('favicon')}}

        </div>

      </div>  
      
      <div class="form-group">

        <label for="logo">Logo</label>

        <input type="file" name="logo" value="{{old('logo') ? old('logo') : $gs->logo}}" class="form-control  {{$errors->first('logo') ? "is-invalid" : ""}}" id="logo" placeholder="Masukkan logo">

        <input type="hidden" name="logo" value="{{ asset('admin/gs/'.$gs->logo) }}">

        <div class="invalid-feedback">

            {{$errors->first('logo')}}

        </div>

      </div> 

      <div class="form-group">

        <label for="bg_title">Background Title</label>

        <input type="file" name="bg_title" value="{{old('bg_title') ? old('bg_title') : $gs->bg_title}}" class="form-control  {{$errors->first('bg_title') ? "is-invalid" : ""}}" id="bg_title" placeholder="Masukkan background title">

        <input type="hidden" name="bg_title" value="{{ asset('admin/gs/'.$gs->bg_title) }}">

        <div class="invalid-feedback">

            {{$errors->first('bg_title')}}

        </div>

      </div>

      <div class="form-group">

        <label for="title">Title</label>

        <input type="text" name="title" value="{{old('title') ? old('title') : $gs->title}}" class="form-control  {{$errors->first('title') ? "is-invalid" : ""}}" id="title" placeholder="Masukkan judul banner">

        <div class="invalid-feedback">

            {{$errors->first('title')}}

        </div>

      </div>     

      <div class="form-group">

        <label for="address">Address</label>

        <input type="text" name="address" value="{{old('address') ? old('address') : $gs->address}}" class="form-control  {{$errors->first('note') ? "is-invalid" : ""}}" id="note" placeholder="Masukkan detail banner">

        <div class="invalid-feedback">

            {{$errors->first('address')}}

        </div>

      </div>     

      <div class="form-group">

        <label for="phone">Phone</label>

        <input type="number" name="phone" value="{{old('phone') ? old('phone') : $gs->phone}}" class="form-control  {{$errors->first('link') ? "is-invalid" : ""}}" id="link" placeholder="Masukkan link banner">

        <div class="invalid-feedback">

            {{$errors->first('phone')}}

        </div>

      </div>  
      
      <div class="form-group">

        <label for="phone">Email</label>

        <input type="email" name="email" value="{{old('email') ? old('email') : $gs->email}}" class="form-control  {{$errors->first('link') ? "is-invalid" : ""}}" id="link" placeholder="Masukkan link banner">

        <div class="invalid-feedback">

            {{$errors->first('email')}}

        </div>

      </div>  
      
      <div class="form-group">

        <label for="maps">Link Maps</label>

        <input type="text" name="maps" value="{{old('maps') ? old('maps') : $gs->maps}}" class="form-control  {{$errors->first('link') ? "is-invalid" : ""}}" id="link" placeholder="Masukkan link banner">

        <div class="invalid-feedback">

            {{$errors->first('maps')}}

        </div>

      </div>

      <div class="form-group">

        <label for="footer">Footer</label>

        <input type="text" name="footer" value="{{old('footer') ? old('footer') : $gs->footer}}" class="form-control  {{$errors->first('link') ? "is-invalid" : ""}}" id="link" placeholder="Masukkan link banner">

        <div class="invalid-feedback">

            {{$errors->first('footer')}}

        </div>

      </div>
      
    </div>
    
    <!-- /.card-body -->

    <div class="card-footer" >

      <button type="submit" class="btn btn-primary">Submit</button>

    </div>

  </form>

</div>

@endsection

@section('script')
    
<script>
      // Prepare the preview for profile picture
      $("#wizard-picture").change(function(){
        readURL(this);
    });
    //Function to show image before upload

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>

    

@endsection