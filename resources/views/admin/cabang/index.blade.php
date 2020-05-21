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

  @if(session('success'))

  <div class="alert alert-success">

      {{session('success')}}

  </div>
  
  @endif

  <div class="card">

    <div class="card-header">

      <a href="{{ route('admin.cabang.create') }}" class="card-title">        
 
        <button type="button" class="btn btn-block btn-primary"><i class="fa fa-plus"></i>Tambah Data</button>
 
      </a>
 
    </div>
 
    <div class="card-body">
 
      <table id="example1" class="table table-bordered table-striped" >
 
        <thead>
 
          <tr>
 
            <th width='5%'>No.</th>
 
            <th>Cabang</th>

            <th>Alamat</th>

            <th>Telephone</th>
 
            <th>Aksi</th>
 
          </tr>
 
        </thead>
 
        @php
        
        $no = 0;
        
        @endphp
        
        <tbody>
        
          @foreach ($cabang as $data)
        
          <tr>
        
            <td>{{ ++$no }}</td>
        
            <td>{{ $data->name }}</td>

            <td>{{ $data->address }}</td>

            <td>{{ $data->phone }}</td>
        
            <td>
        
              <a href="{{route('admin.cabang.edit', [$data->id])}}" class="btn btn-info btn-sm">Edit</a>                
            
              <form class="d-inline" action="{{route('admin.cabang.destroy', [$data->id])}}" method="POST" onsubmit="return confirm('Apakah kamu yakin ?')">

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

  </div>

  @endsection
