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

        <h1 class="m-0 text-dark">Detail Data Ikan</h1>

      </div><!-- /.col -->

      <div class="col-sm-6">

        <ol class="breadcrumb float-sm-right">

          <li class="breadcrumb-item"><a href="#">Home</a></li>

          <li class="breadcrumb-item active">Data Ikan</li>

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

  <form role="form" action="{{ route('admin.ikan.show',$ikan->id) }}" method="GET" >

    @csrf

    <div class="card-body">

      <div class="col-md-6 form-group">

        <label for="photo">Photo</label>

        <div class="picture">

            <img src="{{ $ikan->photo ? asset('admin/ikan/'.$ikan->photo):'http://fulldubai.com/SiteImages/noimage.png'}}" class="picture-src" id="wizardPicturePreview" height="200px" width="400px" title=""/>

        </div>


      </div>

      <div class="row">
        <div class="col-md-3">

            <img src="{{ asset('admin/ikan/'.$ikan->photoa) }}" alt="" height="300px" width="300px">
      
          </div>
          <div class="col-md-3">
      
            <img src="{{ asset('admin/ikan/'.$ikan->photob) }}" alt="" height="300px" width="300px">
      
          </div> 

          <div class="col-md-3">
  
            <img src="{{ asset('admin/ikan/'.$ikan->photoc) }}" alt="" height="300px" width="300px">
    
          </div> 

          <div class="col-md-3">
  
            <img src="{{ asset('admin/ikan/'.$ikan->photod) }}" alt="" height="300px" width="300px">
      
          </div> 
      </div>
       
      <div class="col-md-6 form-group">

        <label for="nama">Ikan</label>

        <input type="text" name="jenis_ikan"  value="{{$ikan->jenis_ikan}}" class="form-control" id="nama" disabled>

      </div>     
      
      <div class="col-md-6 form-group">

        <label for="nama">Kualitas</label>

        <input type="text" name="kualitas" value="{{$ikan->kualitas}}" class="form-control" disabled>

      </div> 
      
      <div class="col-md-6 form-group">

        <label for="ukuran">Ukuran</label>

        <input type="number" name="ukuran" value="{{$ikan->ukuran}}" class="form-control" disabled>

      </div> 

      <div class="col-md-6 form-group">

        <label for="qty">Qty<span>(dalam kg)</span></label>

        <input type="number" name="qty"  value="{{$ikan->qty}}" class="form-control"  disabled>

      </div> 
      
      <div class="col-md-6 form-group">

        <label for="harga">Harga</label>

        <input type="number" name="harga"  value="{{$ikan->harga}}" class="form-control"  disabled>

      </div>   
      
      <div class="col-md-6 form-group">

        <label for="tgl_masuk">Tanggal Masuk</label>

        <input type="date" name="tgl_masuk"  value="{{$ikan->tgl_masuk}}" class="form-control" disabled>

      </div>  
      
      <div class="col-md-6 form-group">

        <label for="wilayah_penangkapan">Wilayah Penangkapan</label>

        <input type="text" name="wilayah_penangkapan"  value="{{$ikan->wilayah_penangkapan}}" class="form-control" disabled>

      </div>     
      
    </div>

  </form>

</div>

@endsection

@section('script')
    <!-- Summernote -->
<script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>

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