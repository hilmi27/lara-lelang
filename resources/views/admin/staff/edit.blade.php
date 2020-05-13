@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->

<div class="content-header">

  <div class="container-fluid">

    <div class="row mb-2">

      <div class="col-sm-6">

        <h1 class="m-0 text-dark">Data staff</h1>

      </div><!-- /.col -->

      <div class="col-sm-6">

        <ol class="breadcrumb float-sm-right">

          <li class="breadcrumb-item"><a href="#">Home</a></li>

          <li class="breadcrumb-item active">Data Staff</li>

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

  <form role="form" action="{{ route('admin.staff.update',$staff->id) }}" method="POST" >

    @csrf

    <div class="card-body">

      <div class="col-md-6 form-group">

        <label for="nama">Nama</label>

        <input type="text" name="name"  value="{{old('name') ? old('name') : $staff->name}}" class="form-control  {{$errors->first('name') ? "is-invalid" : ""}}" id="name" placeholder="Masukkan nama staff">

        <div class="invalid-feedback">

            {{$errors->first('name')}}

        </div>


      </div>     
      
      <div class="col-md-6 form-group">

        <label for="nama">Email</label>

        <input type="email" name="email" value="{{old('email') ? old('email') : $staff->email}}" class="form-control  {{$errors->first('email') ? "is-invalid" : ""}}" id="email" placeholder="Masukkan email staff">

        <div class="invalid-feedback">

            {{$errors->first('email')}}

        </div>

      </div> 
      
      <div class="col-md-6 form-group">

        <label for="no_ktp">Password</label>

        <input type="password" name="password" value="{{old('password') ? old('password') : $staff->password}}" class="form-control  {{$errors->first('password') ? "is-invalid" : ""}}"  id="password" placeholder="Masukkan password staff">

        <div class="invalid-feedback">

            {{$errors->first('password')}}

        </div>

      </div> 
      
      <div class="col-md-6 form-group">

        <label for="unit_kerja">Unit Kerja</label>

        <input type="text" name="unit_kerja" value="{{old('unit_kerja') ? old('unit_kerja') : $staff->unit_kerja}}" class="form-control  {{$errors->first('unit_kerja') ? "is-invalid" : ""}}" id="unit_kerja" placeholder="Masukkan unit kerja">

        <div class="invalid-feedback">

            {{$errors->first('unit_kerja')}}

        </div>

      </div>    
      
      <div class="col-md-6 form-group">

        <label for="jabatan">Jabatan</label>

        <input type="text" name="jabatan" value="{{old('jabatan') ? old('jabatan') : $staff->jabatan}}" class="form-control  {{$errors->first('jabatan') ? "is-invalid" : ""}}" id="jabatan" placeholder="Masukkan jabatan">

        <div class="invalid-feedback">

            {{$errors->first('jabatan')}}

        </div>

      </div>  

      <div class="col-md-6 form-group">

        <label for="nomor_pegawai">No. Pegawai</label>

        <input type="number" name="no_pegawai" value="{{old('no_pegawai') ? old('no_pegawai') : $staff->no_pegawai}}" class="form-control  {{$errors->first('no_pegawai') ? "is-invalid" : ""}}" id="nomor_pegawai" placeholder="Masukkan nomor pegawai">

        <div class="invalid-feedback">

            {{$errors->first('no_pegawai')}}

        </div>

      </div>  
      
      <div class="col-md-6 form-group">

        <label for="role">Role</label>

        <select name="role" id="" class="form-control  {{$errors->first('nama_kapal') ? "is-invalid" : ""}}" >
        
            <option value="">Pilih Role</option>

            <option {{$staff->role == 'Administrator' ? "selected":""}} value="Administrator" >Administrator</option>

            <option {{$staff->role == 'Watcher' ? "selected":""}} value="Watcher">Watcher</option>

            <option {{$staff->role == 'Operator' ? "selected":""}} value="Operator">Operator</option>

        </select>

        <div class="invalid-feedback">

            {{$errors->first('role')}}

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