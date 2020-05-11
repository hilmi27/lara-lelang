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
        <p>Euismod phasellus ac lectus fusce parturient cubilia a nisi blandit sem cras nec tempor adipiscing rcu ullamcorper ligula.</p>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <div class="box_contacts">
                <i class="ti-support"></i>
                <h2>Kulelang Call Center</h2>
                <a href="#0">{{ $gs->phone }}</a>
               
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
                <a href="#0">{{ $gs->email }}</a>
            </div>
        </div>
    </div>
    <!-- /row -->				
</div>
<!-- /container -->
<div class="bg_white">
<div class="container margin_60_35">
    {{-- <h4 class="pb-3">Drop Us a Line</h4> --}}
    <div class="row">
        {{-- <div class="col-lg-4 col-md-6 add_bottom_25">
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Name *">
            </div>
            <div class="form-group">
                <input class="form-control" type="email" placeholder="Email *">
            </div>
            <div class="form-group">
                <textarea class="form-control" style="height: 150px;" placeholder="Message *"></textarea>
            </div>
            <div class="form-group">
                <input class="btn_1 full-width" type="submit" value="Submit">
            </div>
        </div> --}}
        <div class="col-lg-12 col-md-12 add_bottom_25">
        <iframe class="map_contact" src="{{ $gs->maps }}" style="border: 0" allowfullscreen></iframe>
        </div>
    </div>
    <!-- /row -->
</div>
<!-- /container -->
</div>
<!-- /bg_white -->
@endforeach
@endsection