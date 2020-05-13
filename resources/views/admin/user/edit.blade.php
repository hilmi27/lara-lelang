@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->

<div class="content-header">

  <div class="container-fluid">

    <div class="row mb-2">

      <div class="col-sm-6">

        <h1 class="m-0 text-dark">Data User</h1>

      </div><!-- /.col -->

      <div class="col-sm-6">

        <ol class="breadcrumb float-sm-right">

          <li class="breadcrumb-item"><a href="#">Home</a></li>

          <li class="breadcrumb-item active">Data User</li>

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

  <form role="form" action="{{ route('admin.user.update',$user->id) }}" method="POST" >

    @csrf

    <div class="card-body">

      <div class="col-md-6 form-group">

        <label for="nama">Nama</label>

        <input type="text" name="name"  value="{{old('name') ? old('name') : $user->name}}" class="form-control  {{$errors->first('name') ? "is-invalid" : ""}}" id="name" placeholder="Masukkan nama user">

        <div class="invalid-feedback">

            {{$errors->first('name')}}

        </div>


      </div>     
      
      <div class="col-md-6 form-group">

        <label for="nama">Email</label>

        <input type="email" name="email" value="{{old('email') ? old('email') : $user->email}}" class="form-control  {{$errors->first('email') ? "is-invalid" : ""}}" id="email" placeholder="Masukkan email user">

        <div class="invalid-feedback">

            {{$errors->first('email')}}

        </div>

      </div> 

      <div class="col-md-6 form-group">

        <label for="no_hp">No HP</label>

        <input type="number" name="no_hp" value="{{old('no_hp') ? old('no_hp') : $user->no_hp}}" class="form-control  {{$errors->first('no_hp') ? "is-invalid" : ""}}" id="no_hp" placeholder="Masukkan no. hp user">

        <div class="invalid-feedback">

            {{$errors->first('no_hp')}}

        </div>

      </div> 

      <div class="col-md-6 form-group">

        <label for="no_ktp">No. KTP</label>

        <input type="number" name="no_ktp" value="{{old('no_ktp') ? old('no_ktp') : $user->no_ktp}}" class="form-control  {{$errors->first('no_ktp') ? "is-invalid" : ""}}" id="no_ktp" placeholder="Masukkan no. ktp user">

        <div class="invalid-feedback">

            {{$errors->first('no_ktp')}}

        </div>

      </div> 
      
      <div class="col-md-6 form-group">

        <label for="alamat">Alamat</label>

        <input type="alamat" name="alamat" value="{{old('alamat') ? old('alamat') : $user->alamat}}" class="form-control  {{$errors->first('alamat') ? "is-invalid" : ""}}" id="alamat" placeholder="Masukkan email user">

        <div class="invalid-feedback">

            {{$errors->first('alamat')}}

        </div>

      </div> 

      <div class="col-md-6 form-group">

        <label for="unit_kerja">Unit Kerja</label>

        <input type="text" name="unit_kerja" value="{{old('unit_kerja') ? old('unit_kerja') : $user->unit_kerja}}" class="form-control  {{$errors->first('unit_kerja') ? "is-invalid" : ""}}" id="unit_kerja" placeholder="Masukkan unit kerja">

        <div class="invalid-feedback">

            {{$errors->first('unit_kerja')}}

        </div>

      </div> 

      <div class="col-md-6 form-group">

        <label for="lok_simpanan">Lok. Simpanan</label>

        <input type="text" name="lok_simpanan" value="{{old('lok_simpanan') ? old('lok_simpanan') : $user->lok_simpanan}}" class="form-control  {{$errors->first('lok_simpanan') ? "is-invalid" : ""}}" id="lok_simpanan" placeholder="Masukkan lokasi simpanan">

        <div class="invalid-feedback">

            {{$errors->first('lok_simpanan')}}

        </div>

      </div> 
      <div class="col-md-6 form-group">

        <label for="no_ktp">Password</label>

        <input type="password" name="password" value="{{old('password') ? old('password') : $user->password}}" class="form-control  {{$errors->first('password') ? "is-invalid" : ""}}"  id="password" placeholder="Masukkan password user">

        <div class="invalid-feedback">

            {{$errors->first('password')}}

        </div>

      </div> 
      
        

      <div class="col-md-6 form-group">

        <label for="nomor_pegawai">Status</label>

        <select name="status" id="" class="form-control {{$errors->first('status') ? "is-invalid" : ""}}">

            <option value="">Pilih Status</option>

            <option  {{$user->status == 'Actived' ? "selected":""}} value="Actived">Aktif</option>

            <option  {{$user->status == 'Nonactived' ? "selected":""}} value="Nonactived">Tidak Aktif</option>
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