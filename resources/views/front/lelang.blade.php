@extends('layouts.front')

@section('style')
    <!-- SPECIFIC CSS -->
    <link href="{{ asset('front/css/listing.css') }}" rel="stylesheet">

@endsection

@section('content')

@foreach ($gs as $gs)

<div class="top_banner">

    <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.3)">

        <div class="container">

            <div class="breadcrumbs">

                <ul>

                    <li><a href="#">Home</a></li>

                    <li><a href="#">Lelang</a></li>

                </ul>

            </div>

            <h1>Lelang Ikan</h1>

        </div>

    </div>

    <img src="{{ asset('admin/gs/'.$gs->bg_title) }}" class="img-fluid" alt="">

</div>

@endforeach

<div class="container margin_30">

    <div class="row small-gutters">

        @foreach ($lelang as $data)       
        
        <div class="col-6 col-md-4 col-xl-3">
        
            <div class="grid_item">
        
                <figure>
        
                    <a href="{{ route('front.lelangshow',$data->id) }}">
        
                        <img class="img-fluid lazy" src="{{ asset('admin/lelang/'.$data->photo) }}" data-src="{{ asset('admin/lelang/'.$data->photo) }}" alt="">
        
                    </a>
        
                    {{-- <div data-countdown="2020/05/10" class="countdown"></div> --}}
        
                </figure>
        
                <a href="{{ route('front.lelangshow',$data->id) }}">
        
                    <h3>{{ $data->title }}</h3>
        
                </a>
        
                <div class="price_box">
        
                    <span>Open Bid </span><span class="new_price">Rp. {{ number_format($data->harga_awal) }}</span>
        
                </div>
        
            </div>
        
        </div>

        @endforeach        
  
    </div>        

    <div class="pagination__wrapper">

        <ul class="pagination">

            {{ $lelang->links() }}

        </ul>

    </div>        

</div>

@endsection

@section('script')
    <!-- SPECIFIC SCRIPTS -->
	<script src="{{ asset('front/js/sticky_sidebar.min.js') }}"></script>
	<script src="{{ asset('front/js/specific_listing.js') }}"></script>
		
@endsection