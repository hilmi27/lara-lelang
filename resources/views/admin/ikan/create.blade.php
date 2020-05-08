@extends('layouts.admin')

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

  <form role="form" action="{{ route('admin.ikan.store') }}" method="POST" >

    @csrf

    <div class="card-body">

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

      <button type="submit" class="btn btn-primary">Submit</button>

    </div>

  </form>

</div>

@endsection