@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->

<div class="content-header">

  <div class="container-fluid">

    <div class="row mb-2">

      <div class="col-sm-6">

        <h1 class="m-0 text-dark">Data Wilayah</h1>

      </div><!-- /.col -->

      <div class="col-sm-6">

        <ol class="breadcrumb float-sm-right">

          <li class="breadcrumb-item"><a href="#">Home</a></li>

          <li class="breadcrumb-item active">Data Wilayah</li>

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

  <form role="form" action="{{ route('admin.wilayah.update',$wilayah->id) }}" method="POST" >

    @csrf

    <div class="card-body">

      <div class="col-md-6 form-group">

        <label for="nama">Nama</label>

        <input type="text" name="nama"  value="{{old('nama') ? old('nama') : $wilayah->nama}}" class="form-control  {{$errors->first('nama') ? "is-invalid" : ""}}" id="nama" placeholder="Masukkan nama wilayah">

        <div class="invalid-feedback">

            {{$errors->first('nama')}}

        </div>


      </div>     
      
    </div>
    
    <!-- /.card-body -->

    <div class="card-footer">

      <button type="submit" class="btn btn-primary">Update</button>

    </div>

  </form>

</div>

@endsection