@extends('layouts.admin')

@section('content')

<div class="content-header">

  <div class="container-fluid">

    <div class="row mb-2">

      <div class="col-sm-6">

        <h1 class="m-0 text-dark">Data Cabang</h1>

      </div>

      <div class="col-sm-6">

        <ol class="breadcrumb float-sm-right">

          <li class="breadcrumb-item"><a href="#">Home</a></li>

          <li class="breadcrumb-item active">Data Cabang</li>

        </ol>

      </div>

    </div>

  </div>

</div>

@if(session('error'))

<div class="alert alert-danger">

  {{session('error')}}

</div>

@endif

<div class="card card-primary">

  <form role="form" action="{{ route('admin.cabang.store') }}" method="POST" >

    @csrf

    <div class="card-body">
      
      <div class="col-md-6 form-group">

        <label for="name">Nama Cabang</label>

        <input type="text" name="name" value="{{old('name')}}" class="form-control  {{$errors->first('name') ? "is-invalid" : ""}}"  id="name" placeholder="Masukkan nama cabang">

        <div class="invalid-feedback">

            {{$errors->first('name')}}

        </div>

      </div> 

      <div class="col-md-6 form-group">

        <label for="address">Alamat</label>

        <input type="text" name="address" value="{{old('address')}}" class="form-control  {{$errors->first('address') ? "is-invalid" : ""}}"  id="address" placeholder="Perum Perikanan Cabang Jakarta Jl.Muara Baru Ujung Penjaringan Jakarta Utara 14440">

        <div class="invalid-feedback">

            {{$errors->first('address')}}

        </div>

      </div> 
      
      <div class="col-md-6 form-group">

        <label for="link_maps">Link Google Maps</label>

        <input type="text" name="link_maps" value="{{old('link_maps')}}" class="form-control  {{$errors->first('link_maps') ? "is-invalid" : ""}}"  id="link_maps" placeholder="https://www.google.com/maps/place/Perum+Perikanan+Indonesia/@-6.1011757,106.798172,17z/data=!3m1!4b1!4m5!3m4!1s0x2e6a1def1584a2a3:0xd521d5d1dac41831!8m2!3d-6.1011757!4d106.8003607">

        <div class="invalid-feedback">

            {{$errors->first('link_maps')}}

        </div>

      </div>   
      
      <div class="col-md-6 form-group">

        <label for="email">Email</label>

        <input type="email" name="email" value="{{old('email')}}" class="form-control  {{$errors->first('email') ? "is-invalid" : ""}}" id="email" placeholder="Masukkan email cabang">

        <div class="invalid-feedback">

            {{$errors->first('email')}}

        </div>

      </div> 
      
      <div class="col-md-6 form-group">

        <label for="phone">Phone</label>

        <input type="text" name="phone" value="{{old('phone')}}" class="form-control  {{$errors->first('phone') ? "is-invalid" : ""}}" id="phone" placeholder="Masukkan nomor telephone cabang">

        <div class="invalid-feedback">

            {{$errors->first('phone')}}

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
