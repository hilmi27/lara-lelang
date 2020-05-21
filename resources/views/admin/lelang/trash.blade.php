@extends('layouts.admin')

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
  @if(session('success'))

  <div class="alert alert-success">

      {{session('success')}}

  </div>
  
  @endif

  <div class="card">
 
    <div class="card-body">
 
      <table id="example1" class="table table-bordered table-striped" >
 
        <thead>
 
          <tr>
 
            <th>No.</th>
 
            <th>Jenis Ikan</th>

            <th>Jumlah</th>

            <th>Harga Awal</th>

            <th>Tanggal Lelang</th>

            <th>Status</th>
 
            <th>Aksi</th>
 
          </tr>
 
        </thead>
 
        @php
        
        $no = 0;
        
        @endphp
        
        <tbody>
        
          @foreach ($lelang as $data)
        
          <tr>
        
            <td>{{ ++$no }}</td>
        
            <td>{{ $data->jenis_ikan }}</td>

            <td>{{ $data->qty }}</td>

            <td>{{ $data->harga_awal }}</td>

            <td>{{ $data->tgl_lelang }}</td>

            <td>{{ $data->status }}</td>
        
            <td>
        
                <form method="POST" action="{{route('admin.lelang.restore', [$data->id])}}" class="d-inline">
                                    
                    @csrf
                    
                    <input type="submit" value="Restore" class="btn btn-success btn-sm">
                    
                </form>

                <form method="POST" action="{{route('admin.lelang.delete-permanent', [$data->id])}}" class="d-inline" onsubmit="return confirm('Apakah kamu yakin ingin menghapus permanen ?')">

                    @csrf

                        <input type="hidden" name="_method" value="DELETE">

                        <input type="submit" value="Hapus Permanen" class="btn btn-danger btn-sm">

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
