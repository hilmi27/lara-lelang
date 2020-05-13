@extends('layouts.admin')

@section('content')

<div class="content-header">

  <div class="container-fluid">

    <div class="row mb-2">

      <div class="col-sm-6">

        <h1 class="m-0 text-dark">Dashboard</h1>

      </div>
            
      <div class="col-sm-6">
      
        <ol class="breadcrumb float-sm-right">
      
          <li class="breadcrumb-item"><a href="#">Home</a></li>
      
          <li class="breadcrumb-item active">Dashboard</li>
      
        </ol>
      
      </div>
      
    </div>
    
  </div>
  
</div>

<section class="content">
 
  <div class="container-fluid">

    <div class="row">

      <div class="col-lg-3 col-6">

        <div class="small-box bg-info">

          <div class="inner">

            <h3>{{ $ikan }}</h3>  
            
            <p>Ikan</p>
            
          </div>
          
          <div class="icon">
          
            <i class="ion ion-bag"></i>
          
          </div>
          
          <a href="{{ route('admin.ikan') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          
        </div>
        
      </div>

      <div class="col-lg-3 col-6">
  
        <div class="small-box bg-success">
  
          <div class="inner">
  
            <h3>{{ $lelang }}</h3>

            <p>Lelang</p>

          </div>

          <div class="icon">

            <i class="ion ion-bag"></i>

          </div>

          <a href="{{ route('admin.lelang') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

        </div>

      </div>

      <div class="col-lg-3 col-6">

        <div class="small-box bg-warning">

          <div class="inner">

            <h3>{{ $user }}</h3>

            <p>User</p>

          </div>

          <div class="icon">

            <i class="ion ion-person-add"></i>

          </div>

          <a href="{{ route('admin.staff') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

        </div>

      </div>

      <div class="col-lg-3 col-6">

        <div class="small-box bg-danger">

          <div class="inner">

            <h3>{{ $nelayan }}</h3>

            <p>Nelayan</p>

          </div>

          <div class="icon">

            <i class="ion ion-person-add"></i>

          </div>

          <a href="{{ route('admin.nelayan') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

        </div>

      </div>

    </div>

  </div>

</section>

@endsection