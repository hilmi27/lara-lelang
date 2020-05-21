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

        <h1 class="m-0 text-dark">Data Jenis Ikan</h1>

      </div><!-- /.col -->

      <div class="col-sm-6">

        <ol class="breadcrumb float-sm-right">

          <li class="breadcrumb-item"><a href="#">Home</a></li>

          <li class="breadcrumb-item active">Data Jenis Ikan</li>

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

  <form role="form" action="{{ route('admin.ikan.store') }}" method="POST" enctype="multipart/form-data">

    @csrf

    <div class="card-body">

      <div class="col-md-6 form-group">

        <label for="photo">Photo</label>

        <div class="picture">

          <img src="" class="picture-src" id="wizardPicturePreview" height="200px" width="400px" title=""/>

          <input type="file" id="wizard-picture" name="photo">

      </div>

      <h6>Pilih Cover</h6>

      </div>

      <div class="col-md-6 form-group">

        <label for="photoa">Photo  </label><span>(*optional)</span>
  
        <input type="file" name="photoa" value="{{old('photoa')}}" class="form-control  {{$errors->first('photoa') ? "is-invalid" : ""}}"  id="photoa">
  
        <div class="invalid-feedback">
  
            {{$errors->first('photoa')}}
  
        </div>
  
      </div> 
  
      <div class="col-md-6 form-group">
  
        <label for="photob">Photo</label><span>(*optional)</span>
  
        <input type="file" name="photob" value="{{old('photob')}}" class="form-control  {{$errors->first('photob') ? "is-invalid" : ""}}"  id="photob">
  
        <div class="invalid-feedback">
  
            {{$errors->first('photob')}}
  
        </div>
  
      </div> 
  
      <div class="col-md-6 form-group">
  
        <label for="photoc">Photo</label><span>(*optional)</span>
  
        <input type="file" name="photoc" value="{{old('photoc')}}" class="form-control  {{$errors->first('photoc') ? "is-invalid" : ""}}"  id="photoc" >
  
        <div class="invalid-feedback">
  
            {{$errors->first('photoc')}}
  
        </div>
  
      </div> 
  
      <div class="col-md-6 form-group">
  
        <label for="photod">Photo</label><span>(*optional)</span>
  
        <input type="file" name="photod" value="{{old('photod')}}" class="form-control  {{$errors->first('photod') ? "is-invalid" : ""}}"  id="photod">
  
        <div class="invalid-feedback">
  
            {{$errors->first('photod')}}
  
        </div>
  
      </div> 

      <div class="col-md-6 form-group">

        <label for="nama">Ikan</label>

        {{-- <input type="text" name="nama"  value="{{old('nama')}}" class="form-control  {{$errors->first('nama') ? "is-invalid" : ""}}" id="nama" placeholder="Masukkan nama nelayan"> --}}

        <select name="jenis_ikan" id="" class="form-control  {{$errors->first('jenis_ikan') ? "is-invalid" : ""}}">
            
            <option value="">Pilih Jenis Ikan</option>
            
            @foreach($jenis as $jenis)

            <option value="{{$jenis->name}}" >{{$jenis->name}}</option>

            @endforeach
        </select>

        <div class="invalid-feedback">

            {{$errors->first('jenis_ikan')}}

        </div>


      </div>     
      
      <div class="col-md-6 form-group">

        <label for="nama">Kualitas</label>

        {{-- <input type="text" name="alamat" value="{{old('alamat')}}" class="form-control  {{$errors->first('alamat') ? "is-invalid" : ""}}" id="alamat" placeholder="Masukkan alamat nelayan"> --}}

        <select name="kualitas" id="" class="form-control  {{$errors->first('kualitas') ? "is-invalid" : ""}}">
        
            <option value="">Pilih Kualitas</option>

            <option value="A">A</option>

            <option value="B">B</option>

            <option value="C">C</option>

            <option value="BS">BS</option>
        
        </select>

        <div class="invalid-feedback">

            {{$errors->first('alamat')}}

        </div>

      </div> 
      
      <div class="col-md-6 form-group">

        <label for="ukuran">Ukuran</label>

        <input type="number" name="ukuran" value="{{old('ukuran')}}" class="form-control  {{$errors->first('ukuran') ? "is-invalid" : ""}}"  id="ukuran" placeholder="Masukkan ukuran ikan">

        <div class="invalid-feedback">

            {{$errors->first('ukuran')}}

        </div>

      </div> 

      <div class="col-md-6 form-group">

        <label for="qty">Qty<span>(dalam kg)</span></label>

        <input type="number" name="qty" value="{{old('qty')}}" class="form-control  {{$errors->first('qty') ? "is-invalid" : ""}}"  id="qty" placeholder="1000">

        <div class="invalid-feedback">

            {{$errors->first('qty')}}

        </div>

      </div> 
      
      <div class="col-md-6 form-group">

        <label for="harga">Harga</label>

        <input type="number" name="harga" value="{{old('harga')}}" class="form-control  {{$errors->first('harga') ? "is-invalid" : ""}}"  id="harga" placeholder="20000">

        <div class="invalid-feedback">

            {{$errors->first('harga')}}

        </div>

      </div>   
      
      <div class="col-md-6 form-group">

        <label for="tgl_masuk">Tanggal Masuk</label>

        <input type="date" name="tgl_masuk" value="{{old('tgl_masuk')}}" class="form-control  {{$errors->first('tgl_masuk') ? "is-invalid" : ""}}" id="tgl_masuk">

        <div class="invalid-feedback">

            {{$errors->first('tgl_masuk')}}

        </div>

      </div>  
      
      <div class="col-md-6 form-group">

        <label for="wilayah_penangkapan">Wilayah Penangkapan</label>

        {{-- <input type="text" name="nama"  value="{{old('nama')}}" class="form-control  {{$errors->first('nama') ? "is-invalid" : ""}}" id="nama" placeholder="Masukkan nama nelayan"> --}}

        <select name="wilayah_penangkapan" id="" class="form-control  {{$errors->first('wilayah_penangkapan') ? "is-invalid" : ""}}">
            
            <option value="">Pilih Wilayah</option>
            @foreach($wilayah as $wilayah)

            <option value="{{$wilayah->nama}}" >{{$wilayah->nama}}</option>

            @endforeach
        </select>

        <div class="invalid-feedback">

            {{$errors->first('wilayah_penangkapan')}}

        </div>


      </div>     
      
    </div>
    
    <!-- /.card-body -->

    <div class="card-footer">

      <button type="submit" class="btn btn-primary">Simpan</button>

    </div>

  </form>

</div>

@endsection

@section('script')
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