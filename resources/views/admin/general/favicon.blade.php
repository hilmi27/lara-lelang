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

        <h1 class="m-0 text-dark">General Setting</h1>

      </div><!-- /.col -->

      <div class="col-sm-6">

        <ol class="breadcrumb float-sm-right">

          <li class="breadcrumb-item"><a href="#">Home</a></li>

          <li class="breadcrumb-item active">General Setting</li>

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

  <form role="form" action="{{ route('admin.generalsetting.faviconupdate',$favicon->id) }}" method="POST" enctype="multipart/form-data">

    @csrf

    <div class="card-body">

      <div class="form-group">

        <div class="picture-container">

            <div class="picture">

                <img src="{{ $favicon->favicon ? asset('admin/gs/'. $favicon->favicon):'http://fulldubai.com/SiteImages/noimage.png'}}" class="picture-src" id="wizardPicturePreview" height="200px" width="400px" title=""/>

                <input type="file" id="wizard-picture" name="photo">

            </div>

            <h6>Pilih Cover</h6>

        </div>

      </div>  
      
    </div>
    
    <!-- /.card-body -->

    <div class="card-footer" >

      <button type="submit" class="btn btn-primary">Update</button>

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