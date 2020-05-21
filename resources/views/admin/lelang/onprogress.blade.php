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

    <div class="card-header">
 
    </div>
 
    <!-- /.card-header -->
 
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

            <td>Rp. {{ number_format($data->harga_awal) }}</td>

            <td>{{ \Carbon\Carbon::parse($data->tgl_lelang)->format('d/m/Y') }}</td>

            <td>{{ $data->status }}</td>
        
            <td>
        
              <a href="{{route('admin.lelang.show', [$data->id])}}" class="btn btn-info btn-sm"> Show</a>     

              <a href="{{route('admin.lelang.edit', [$data->id])}}" class="btn btn-info btn-sm"> Edit</a>                

            </td>

          </tr>

          @endforeach

        </tbody>

      </table>

    </div>

    <!-- /.card-body -->

  </div>

  @endsection
