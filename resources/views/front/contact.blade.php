@extends('layouts.front')

@section('style')
    <!-- SPECIFIC CSS -->
    <link href="{{ asset('front/css/contact.css') }}" rel="stylesheet">

@endsection

@section('content')
    
@foreach ($gs as $gs)
    
<div class="container margin_60">
    
    <div class="main_title">

        <h2>Contact Kulelang.com</h2>

    </div>

    <div class="row justify-content-center">

        <div class="col-lg-4">

            <div class="box_contacts">

                <i class="ti-support"></i>

                <h2>Kulelang Call Center</h2>

                <a href="tel:{{ $gs->phone }}">{{ $gs->phone }}</a>               
      
            </div>
      
        </div>
      
        <div class="col-lg-4">
      
            <div class="box_contacts">
      
                <i class="ti-map-alt"></i>
      
                <h2>Kulelang.com Office</h2>
      
                <div>{{ $gs->address }}</div>
      
            </div>
      
        </div>
      
        <div class="col-lg-4">
      
            <div class="box_contacts">
      
                <i class="ti-package"></i>
      
                <h2>Kulelang Email</h2>
      
                <a href="mailto:{{ $gs->email }}">{{ $gs->email }}</a>
      
            </div>
      
        </div>
    
    </div>		

</div>

<div class="bg_white">

    <div class="container margin_60_35">

        <div class="row">        
 
            <div class="col-lg-12 col-md-12 add_bottom_25">
 
                <iframe class="map_contact" src="{{ $gs->maps }}" style="border: 0" allowfullscreen></iframe>
 
            </div>
 
        </div>

    </div>

</div>

@endforeach

@endsection