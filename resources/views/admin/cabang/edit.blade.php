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

  <form role="form" action="{{ route('admin.cabang.update',$cabang->id) }}" method="POST">

    @csrf

    <div class="card-body">
      
      <div class="form-group">

        <label for="name">Nama Cabang</label>

        <input type="text" name="name" value="{{old('name') ? old('name') : $cabang->name}}" class="form-control  {{$errors->first('name') ? "is-invalid" : ""}}" id="name" placeholder="Masukkan nama cabang">

        <div class="invalid-feedback">

            {{$errors->first('name')}}

        </div>

      </div>     

      <div class="form-group">

        <label for="address">Alamat</label>

        <input type="text" name="address" value="{{old('address') ? old('address') : $cabang->address}}" class="form-control  {{$errors->first('address') ? "is-invalid" : ""}}" id="address" placeholder="Masukkan alamat cabang">

        <div class="invalid-feedback">

            {{$errors->first('address')}}

        </div>

      </div>     

      <div class="form-group">

        <label for="link_maps">Link Google Maps</label>

        <input type="text" name="link_maps" value="{{old('link_maps') ? old('link_maps') : $cabang->link_maps}}" class="form-control  {{$errors->first('link_maps') ? "is-invalid" : ""}}" id="link_maps" placeholder="Masukkan link google maps">

        <div class="invalid-feedback">

            {{$errors->first('link_maps')}}

        </div>

      </div>
      
      <div class="form-group">

        <label for="email">Email</label>

        <input type="email" name="email" value="{{old('email') ? old('email') : $cabang->email}}" class="form-control  {{$errors->first('link_maps') ? "is-invalid" : ""}}" id="email" placeholder="Masukkan email">

        <div class="invalid-feedback">

            {{$errors->first('email')}}

        </div>

      </div>

      <div class="form-group">

        <label for="phone">Telephone</label>

        <input type="text" name="phone" value="{{old('phone') ? old('phone') : $cabang->phone}}" class="form-control  {{$errors->first('phone') ? "is-invalid" : ""}}" id="phone" placeholder="Masukkan nomor telephone">

        <div class="invalid-feedback">

            {{$errors->first('phone')}}

        </div>

      </div>
      
    </div>
  
    <div class="card-footer" >

      <button type="submit" class="btn btn-primary">Submit</button>

    </div>

  </form>

</div>

@endsection