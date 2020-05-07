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

    <form role="form" action="{{ route('admin.jenisikan.edit',$jenisikan->id) }}" method="POST" >

        @csrf

        <div class="card-body">

            <div class="form-group">

                <label for="name">Name</label>

                <input type="text" name="name" class="form-control" id="name" value="{{ $jenisikan->name }}" placeholder="Masukkan nama jenis ikan">

            </div>       
      
        </div>
      
        <!-- /.card-body -->

        <div class="card-footer">

            <button type="submit" class="btn btn-primary">Submit</button>

        </div>

    </form>

</div>

@endsection