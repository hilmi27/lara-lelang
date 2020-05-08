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

        <h1 class="m-0 text-dark">Data Banner Slider</h1>

      </div><!-- /.col -->

      <div class="col-sm-6">

        <ol class="breadcrumb float-sm-right">

          <li class="breadcrumb-item"><a href="#">Home</a></li>

          <li class="breadcrumb-item active">Data Banner Slider</li>

        </ol>

      </div><!-- /.col -->

    </div><!-- /.row -->

  </div><!-- /.container-fluid -->

</div>

<!-- /.content-header -->

@if(session('error'))

<div class="alert alert-danger">

  {{session('error')}}

</div>

@endif

<div class="card card-primary">

  <!-- /.card-header -->

  <!-- form start -->

  <form role="form" action="{{ route('admin.banner.update',$banner->id) }}" method="POST" enctype="multipart/form-data">

    @csrf

    <div class="card-body">

      <div class="form-group">

        <div class="picture-container">

            <div class="picture">

                <img src="{{ $banner->photo ? asset('admin/banner/'.$banner->photo):'http://fulldubai.com/SiteImages/noimage.png'}}" class="picture-src" id="wizardPicturePreview" height="200px" width="400px" title=""/>

                <input type="file" id="wizard-picture" name="photo">

            </div>

            <h6>Pilih Cover</h6>

        </div>

      </div>   
      
      <div class="form-group">

        <label for="title">Title</label>

        <input type="text" name="title" value="{{old('title') ? old('title') : $banner->title}}" class="form-control  {{$errors->first('title') ? "is-invalid" : ""}}" id="title" placeholder="Masukkan judul banner">

        <div class="invalid-feedback">

            {{$errors->first('title')}}

        </div>

      </div>     

      <div class="form-group">

        <label for="note">Note</label>

        <input type="text" name="note" value="{{old('note') ? old('note') : $banner->note}}" class="form-control  {{$errors->first('note') ? "is-invalid" : ""}}" id="note" placeholder="Masukkan detail banner">

        <div class="invalid-feedback">

            {{$errors->first('note')}}

        </div>

      </div>     

      <div class="form-group">

        <label for="link">Link</label>

        <input type="text" name="link" value="{{old('link') ? old('link') : $banner->link}}" class="form-control  {{$errors->first('link') ? "is-invalid" : ""}}" id="link" placeholder="Masukkan link banner">

        <div class="invalid-feedback">

            {{$errors->first('link')}}

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