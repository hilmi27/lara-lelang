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

  <form role="form" action="{{ route('admin.nelayan.update',$nelayan->id) }}" method="POST" >

    @csrf

    <div class="card-body">

      <div class="col-md-6 form-group">

        <label for="nama">Nama</label>

        <input type="text" name="nama"  value="{{old('nama') ? old('nama') : $nelayan->nama}}" class="form-control  {{$errors->first('nama') ? "is-invalid" : ""}}" id="nama" placeholder="Masukkan nama nelayan">

        <div class="invalid-feedback">

            {{$errors->first('nama')}}

        </div>


      </div>     
      
      <div class="col-md-6 form-group">

        <label for="nama">Alamat</label>

        <input type="text" name="alamat" value="{{old('alamat') ? old('alamat') : $nelayan->alamat}}" class="form-control  {{$errors->first('alamat') ? "is-invalid" : ""}}" id="alamat" placeholder="Masukkan alamat nelayan">

        <div class="invalid-feedback">

            {{$errors->first('alamat')}}

        </div>

      </div> 
      
      <div class="col-md-6 form-group">

        <label for="no_ktp">Nomor KTP</label>

        <input type="number" name="no_ktp" value="{{old('no_ktp') ? old('no_ktp') : $nelayan->no_ktp}}" class="form-control  {{$errors->first('no_ktp') ? "is-invalid" : ""}}"  id="no_ktp" placeholder="Masukkan nomor KTP nelayan">

        <div class="invalid-feedback">

            {{$errors->first('no_ktp')}}

        </div>

      </div> 
      
      <div class="col-md-6 form-group">

        <label for="email">Email</label>

        <input type="email" name="email" value="{{old('email') ? old('email') : $nelayan->email}}" class="form-control  {{$errors->first('email') ? "is-invalid" : ""}}" id="email" placeholder="emailnelayan@gmail.com">

        <div class="invalid-feedback">

            {{$errors->first('email')}}

        </div>

      </div>    
      
      <div class="col-md-6 form-group">

        <label for="no_hp">Nomor HP</label>

        <input type="number" name="no_hp" value="{{old('no_hp') ? old('no_hp') : $nelayan->no_hp}}" class="form-control  {{$errors->first('no_hp') ? "is-invalid" : ""}}" id="no_hp" placeholder="082123456789">

        <div class="invalid-feedback">

            {{$errors->first('no_hp')}}

        </div>

      </div>  
      
      <div class="col-md-6 form-group">

        <label for="nama_kapal">Nama Kapal</label>

        <input type="text" name="nama_kapal" value="{{old('nama_kapal') ? old('nama_kapal') : $nelayan->nama_kapal}}" class="form-control  {{$errors->first('nama_kapal') ? "is-invalid" : ""}}" id="nama_kapal" placeholder="masukkan nama kapal">

        <div class="invalid-feedback">

            {{$errors->first('nama_kapal')}}

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