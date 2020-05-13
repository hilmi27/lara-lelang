@extends('layouts.front')

@section('content')
    
<div id="carousel-home">
  
    <div class="owl-carousel owl-theme">

        @foreach ($banner as $banner)  
   
        <div class="owl-slide cover" style="background-image: url({{ asset('admin/banner/'.$banner->photo)}});">
   
            <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
   
                <div class="container">
   
                    <div class="row justify-content-center justify-content-md-end">
   
                        <div class="col-lg-6 static">
   
                            <div class="slide-text text-right white">
   
                                <h2 class="owl-slide-animated owl-slide-title">{{ $banner->title }}</h2>
   
                                <p class="owl-slide-animated owl-slide-subtitle">
   
                                    {{ $banner->note }}
   
                                </p>
   
                                <div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="{{ $banner->link }}" role="button">Visit Now</a></div>
   
                            </div>
   
                        </div>
   
                    </div>
   
                </div>
   
            </div>
   
        </div>
   
        @endforeach
   
    </div>
   
    <div id="icon_drag_mobile"></div>

</div>

<div class="container margin_60_35">
    
    <div class="main_title">
    
        <h2>Lelang Terpopuler</h2>
     
    </div>
    
    <div class="row small-gutters">
    
        @foreach ($poplelang as $lelang)        
    
        <div class="col-6 col-md-4 col-xl-3">
    
            <div class="grid_item">
    
                <figure>
    
                    <a href="{{ route('front.lelangshow',$lelang->id) }}">
    
                        <img class="img-fluid lazy" src="{{ asset('admin/lelang/'.$lelang->photo) }}" data-src="{{ asset('admin/lelang/'.$lelang->photo) }}" alt="" >
                
                    </a>
                
                    <div data-countdown="{{ date('Y-m-d', strtotime('+6 days', strtotime($lelang->tgl_lelang))) }}" class="countdown"></div>
                
                </figure>
                
                <a href="product-detail-1.html">
                
                    <h3>{{ $lelang->jenis_ikan }}</h3>
                
                </a>
                
                <div class="price_box">
                
                    <span class="new_price">Rp. {{ number_format($lelang->harga_awal) }}</span>
                
                </div>
            
            </div>

        </div>

        @endforeach       
   
    </div>
   
</div>

<div class="container margin_60_35">

    <div class="main_title">

        <h2>Lelang Terbaru</h2>

    </div>

    <div class="owl-carousel owl-theme products_carousel">

        @foreach ($newlelang as $lelang)

        <div class="item">                
   
            <div class="grid_item">
   
                <figure>
   
                    <a href="{{ route('front.lelangshow',$lelang->id) }}">
   
                        <img class="owl-lazy" src="{{ asset('admin/lelang/'.$lelang->photo) }}" data-src="{{ asset('admin/lelang/'.$lelang->photo) }}" alt="">
   
                    </a>
   
                </figure>
   
                <a href="{{ route('front.lelangshow',$lelang->id) }}">
   
                    <h3>{{ $lelang->title }}</h3>
   
                </a>
   
                <div class="price_box">
   
                    <span class="new_price">Open Bid: Rp. {{ number_format($lelang->harga_awal) }}</span>
   
                </div>
   
            </div>

        </div>

        @endforeach

    </div>

</div>

@endsection