@extends('layouts.admin')

@section('content')
  
  <!-- Content Header (Page header) -->
  
  <div class="content-header">
  
    <div class="container-fluid">
  
      <div class="row mb-2">
  
        <div class="col-sm-6">
  
          <h1 class="m-0 text-dark">General Setting</h1>
  
        </div><!-- /.col -->
  
        <div class="col-sm-6">
  
          <ol class="breadcrumb float-sm-right">
  
            <li class="breadcrumb-item"><a href="#">Home</a></li>
  
            <li class="breadcrumb-item active">General Setting</li>
  
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
 
            <th>Logo</th>

            <th>Title</th>

            <th>Address</th>
            
            <th>Phone</th>

            <th>Email</th>
 
            <th>Action</th>
 
          </tr>
 
        </thead>
 
        @php
        
        $no = 0;
        
        @endphp
        
        <tbody>
        
          @foreach ($gs as $data)
        
          <tr>
        
            <td>{{ ++$no }}</td>
        
            <td>
                <img src="{{ $data->logo ? asset('admin/gs/'.$data->logo):'http://fulldubai.com/SiteImages/noimage.png'}}" alt="">
            </td>

            <td>{{ $data->title }}</td>

            <td>{{ $data->address }}</td>

            <td>{{ $data->phone }}</td>

            <td>{{ $data->email }}</td>
        
            <td>
        
              <a href="{{route('admin.generalsetting.edit', [$data->id])}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>                

            </td>

          </tr>

          @endforeach

        </tbody>

      </table>

    </div>

    <!-- /.card-body -->

  </div>

  @endsection
