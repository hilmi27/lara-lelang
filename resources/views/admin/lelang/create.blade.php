@extends('layouts.admin')

@section('style')
     <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.css') }}">
  
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

  <form role="form" action="{{ route('admin.lelang.store') }}" method="POST" enctype="multipart/form-data" >

    @csrf

    <div class="card-body">

        <div class="col-md-6 form-group">

            <label for="photo">Photo</label>

            <input type="file" name="photo" id="photo" class="form-control">

        </div>
      
        <div class="col-md-6 form-group">

        <label for="nama">Ikan</label>

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

        <select name="kualitas" id="" class="form-control  {{$errors->first('kualitas') ? "is-invalid" : ""}}">
        
            <option value="">Pilih Kualitas</option>

            <option value="A">A</option>

            <option value="B">B</option>

            <option value="C">C</option>

            <option value="BS">BS</option>
        
        </select>

        <div class="invalid-feedback">

            {{$errors->first('kualitas')}}

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

        <label for="harga_awal">Harga Awal</label>

        <input type="number" name="harga_awal" value="{{old('harga_awal')}}" class="form-control  {{$errors->first('harga_awal') ? "is-invalid" : ""}}"  id="harga_awal" placeholder="20000">

        <div class="invalid-feedback">

            {{$errors->first('harga_awal')}}

        </div>

      </div>   
      
      <div class="col-md-6 form-group">

        <label for="tgl_lelang">Tanggal Lelang</label>

        <input type="date" name="tgl_lelang" value="{{old('tgl_lelang')}}" class="form-control  {{$errors->first('tgl_lelang') ? "is-invalid" : ""}}" id="tgl_masuk">

        <div class="invalid-feedback">

            {{$errors->first('tgl_lelang')}}

        </div>

      </div> 

      <div class="col-md-6 form-group">
          <label for="detail">Detail</label>
          {{-- <textarea name="detail" id="detail" class="form-control" cols="30" rows="10"></textarea> --}}
          <textarea name="detail" id="detail" class="form-control" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
      </div>
      
      <div class="col-md-6 form-group">

        <label for="status">Status</label>

        <select name="status" id="" class="form-control  {{$errors->first('status') ? "is-invalid" : ""}}">
            
            <option value="">Pilih Status</option>
           
            <option value="not yet">Not yet</option>

            <option value="on progress">On progress</option>

            <option value="done">Done</option>

            <option value="cancel">Cancel</option>
        
        </select>

        <div class="invalid-feedback">

            {{$errors->first('status')}}

        </div>


      </div>     
      
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

@endsection