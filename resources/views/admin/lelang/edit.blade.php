@extends('layouts.admin')

@section('style')
     <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.css') }}">
  
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

        <h1 class="m-0 text-dark">Data Lelang</h1>

      </div><!-- /.col -->

      <div class="col-sm-6">

        <ol class="breadcrumb float-sm-right">

          <li class="breadcrumb-item"><a href="#">Home</a></li>

          <li class="breadcrumb-item active">Data Lelang</li>

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

  <form role="form" action="{{ route('admin.lelang.update',$lelang->id) }}" method="POST" enctype="multipart/form-data" >

    @csrf

    <div class="card-body">

        <div class="col-md-6 form-group">

            <label for="photo">Photo</label>

            <div class="picture">

                <img src="{{ $lelang->photo ? asset('admin/lelang/'.$lelang->photo):'http://fulldubai.com/SiteImages/noimage.png'}}" class="picture-src" id="wizardPicturePreview" height="200px" width="400px" title=""/>

                <input type="file" id="wizard-picture" name="photo">

            </div>

            <h6>Pilih Cover</h6>

        </div>

        <div class="col-md-6 form-group">

          <label for="title">Title</label>
  
          <input type="text" name="title" value="{{old('title') ? old('title') : $lelang->title}}" class="form-control  {{$errors->first('title') ? "is-invalid" : ""}}"   id="title" placeholder="Masukkan Judul Lelang">
  
          <div class="invalid-feedback">
  
              {{$errors->first('title')}}
  
          </div>
  
        </div> 
      
        <div class="col-md-6 form-group">

        <label for="nama">Ikan</label>

        <select name="jenis_ikan" id="" class="form-control  {{$errors->first('jenis_ikan') ? "is-invalid" : ""}}">
            
            <option value="">Pilih Jenis Ikan</option>
            
            @foreach($jenis as $jenis)

            <option value="{{$jenis->name}}" {{$jenis->name == $lelang->jenis_ikan ? "selected":""}}  >{{$jenis->name}}</option>

            @endforeach
    
        </select>

        <div class="invalid-feedback">

            {{$errors->first('jenis_ikan')}}

        </div>


      </div>     
      
      <div class="col-md-6 form-group">

        <label for="nama">Kualitas</label>

        <select name="kualitas" id="" class="form-control  {{$errors->first('kualitas') ? "is-invalid" : ""}}">
        
            <option value="">Pilih Kualitas</option>

            <option {{$lelang->kualitas == 'A' ? 'selected' : ''}} value="A" >A</option>

            <option {{$lelang->kualitas == 'B' ? 'selected' : ''}} value="B" >B</option>

            <option {{$lelang->kualitas == 'C' ? 'selected' : ''}} value="C" >C</option>

            <option {{$lelang->kualitas == 'BS' ? 'selected' : ''}} value="BS" >BS</option>
        
        </select>

        <div class="invalid-feedback">

            {{$errors->first('kualitas')}}

        </div>

      </div> 
      
      <div class="col-md-6 form-group">

        <label for="ukuran">Ukuran</label>

        <input type="number" name="ukuran" value="{{old('ukuran') ? old('ukuran') : $lelang->ukuran}}" class="form-control  {{$errors->first('ukuran') ? "is-invalid" : ""}}"  id="ukuran" placeholder="Masukkan ukuran ikan">

        <div class="invalid-feedback">

            {{$errors->first('ukuran')}}

        </div>

      </div> 

      <div class="col-md-6 form-group">

        <label for="qty">Qty<span>(dalam kg)</span></label>

        <input type="number" name="qty" value="{{old('qty') ? old('qty') : $lelang->qty}}" class="form-control  {{$errors->first('qty') ? "is-invalid" : ""}}"  id="qty" placeholder="1000">

        <div class="invalid-feedback">

            {{$errors->first('qty')}}

        </div>

      </div> 
      
      <div class="col-md-6 form-group">

        <label for="harga_awal">Harga Awal</label>

        <input type="number" name="harga_awal" value="{{old('harga_awal') ? old('harga_awal') : $lelang->harga_awal}}" class="form-control  {{$errors->first('harga_awal') ? "is-invalid" : ""}}"  id="harga_awal" placeholder="20000">

        <div class="invalid-feedback">

            {{$errors->first('harga_awal')}}

        </div>

      </div>   
      
      <div class="col-md-6 form-group">

        <label for="tgl_lelang">Tanggal Lelang</label>

        <input type="date" name="tgl_lelang" value="{{old('tgl_lelang') ? old('tgl_lelang') : $lelang->tgl_lelang}}" class="form-control  {{$errors->first('tgl_lelang') ? "is-invalid" : ""}}" id="tgl_masuk">

        <div class="invalid-feedback">

            {{$errors->first('tgl_lelang')}}

        </div>

      </div> 

      <div class="col-md-6 form-group">
          <label for="detail">Detail</label>
         
          <textarea name="detail" id="detail"  class="form-control" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{old('detail') ? old('detail') : $lelang->detail}}</textarea>
      
        </div>
      
      <div class="col-md-6 form-group">

        <label for="status">Status</label>

        <select name="status" id="" class="form-control  {{$errors->first('status') ? "is-invalid" : ""}}">
            
            <option value="">Pilih Status</option>
           
            <option {{$lelang->status == 'not yet' ? 'selected' : ''}} value="not yet">Not yet</option>

            <option {{$lelang->status == 'on progress' ? 'selected' : ''}} value="on progress">On progress</option>

            <option {{$lelang->status == 'done' ? 'selected' : ''}} value="done">Done</option>

            <option {{$lelang->status == 'cancel' ? 'selected' : ''}} value="cancel">Cancel</option>
        
        </select>

        <div class="invalid-feedback">

            {{$errors->first('status')}}

        </div>


      </div> 
      
      <input type="text" name="id_ikan" value="{{ $lelang->id_ikan }}" style="display: none">
      
    </div>
    
    <!-- /.card-body -->

    <div class="card-footer">

      <button type="submit" class="btn btn-primary">Submit</button>

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