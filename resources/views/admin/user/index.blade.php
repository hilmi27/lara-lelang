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
  @if(session('success'))

  <div class="alert alert-success">

      {{session('success')}}

  </div>
  
  @endif

  <div class="card">

    <div class="card-header">

      {{-- <a href="{{ route('admin.staff.create') }}" class="card-title">        
 
        <button type="button" class="btn btn-block btn-primary"><i class="fa fa-plus"></i>Tambah Data</button>
 
      </a> --}}
 
    </div>
 
    <div class="card-body">
 
      <table id="example1" class="table table-bordered table-striped" >
 
        <thead>
 
          <tr>
 
            <th>No.</th>
 
            <th>Nama</th>

            <th>Alamat</th>

            <th>Email</th>

            <th>No. HP</th>
 
            <th>Aksi</th>
 
          </tr>
 
        </thead>
 
        @php
        
        $no = 0;
        
        @endphp
        
        <tbody>
        
          @foreach ($user as $data)
        
          <tr>
        
            <td>{{ ++$no }}</td>
        
            <td>{{ $data->name }}</td>

            <td>{{ $data->alamat }}</td>

            <td>{{ $data->email }}</td>

            <td>{{ $data->no_hp }}</td>
        
            <td>
        
              @php
              $num = (int)$data->no_hp;
              @endphp

              <a href="mailto:{{ $data->email }}" class="btn btn-danger btn-sm" target="_blank"> Email</a>

              <a href="https://wa.me/62{{ $num }}" class="btn btn-success btn-sm" target="_blank"> Whatsapp</a>

              <a href="{{route('admin.user.edit', [$data->id])}}" class="btn btn-info btn-sm"> Edit</a>                
            
              <form class="d-inline" action="{{route('admin.user.destroy', [$data->id])}}" method="POST" onsubmit="return confirm('apakah kamu yakin ?')">

                @csrf 
         
                <input type="hidden" value="DELETE" name="_method">
                
                <input type="submit" class="btn btn-danger btn-sm" value="Hapus">

              </form>

            </td>

          </tr>

          @endforeach

        </tbody>

      </table>

    </div>

    <!-- /.card-body -->

  </div>

  @endsection
