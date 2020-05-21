@extends('layouts.admin')

@section('content')
  
  <div class="content-header">
  
    <div class="container-fluid">
  
      <div class="row mb-2">
  
        <div class="col-sm-6">
  
          <h1 class="m-0 text-dark">Data Banner Slider</h1>
  
        </div>
  
        <div class="col-sm-6">
  
          <ol class="breadcrumb float-sm-right">
  
            <li class="breadcrumb-item"><a href="#">Home</a></li>
  
            <li class="breadcrumb-item active">Data Banner Slider</li>
  
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

      <a href="{{ route('admin.banner.create') }}" class="card-title">        
 
        <button type="button" class="btn btn-block btn-primary"><i class="fa fa-plus"></i>Tambah Data</button>
 
      </a>
 
    </div>
 
    <div class="card-body">
 
      <table id="example1" class="table table-bordered table-striped" >
 
        <thead>
 
          <tr>
 
            <th>No.</th>
 
            <th>Banner</th>
 
            <th>Aksi</th>
 
          </tr>
 
        </thead>
 
        @php
        
        $no = 0;
        
        @endphp
        
        <tbody>
        
          @foreach ($banner as $data)
        
          <tr>
        
            <td>{{ ++$no }}</td>
        
            <td>
                <img src="{{ $data->photo ? asset('admin/banner/'.$data->photo):'http://fulldubai.com/SiteImages/noimage.png'}}" alt="Banner Slider" style="width: 600px; height: 300px">
            </td>
        
            <td>
        
              <a href="{{route('admin.banner.edit', [$data->id])}}" class="btn btn-info btn-sm">Edit</a>                
            
              <form class="d-inline" action="{{route('admin.banner.destroy', [$data->id])}}" method="POST" onsubmit="return confirm('Apakah kamu yakin ?')">

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
