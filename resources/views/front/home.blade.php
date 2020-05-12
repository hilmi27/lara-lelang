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
<!--/carousel-->

<div class="container margin_60_35">
    <div class="main_title">
        <h2>Lelang Terbaru</h2>
    </div>
    <div class="row small-gutters">
        @foreach ($newlelang as $lelang)
            
        <div class="col-6 col-md-4 col-xl-3">
            <div class="grid_item">
                <figure>
                    <a href="product-detail-1.html">
                        <img class="img-fluid lazy" src="{{ asset('admin/lelang/'.$lelang->photo) }}" data-src="{{ asset('admin/lelang/'.$lelang->photo) }}" alt="" >
                        {{-- <img class="img-fluid lazy" src="{{ asset('front/img/products/product_placeholder_square_medium.jpg') }}" data-src="{{ asset('front/img/products/shoes/1_b.jpg') }}" alt=""> --}}
                    </a>
                    <div data-countdown="2019/05/15" class="countdown"></div>
                </figure>
                <a href="product-detail-1.html">
                    <h3>{{ $lelang->jenis_ikan }}</h3>
                </a>
                <div class="price_box">
                    <span class="new_price">Rp. {{ number_format($lelang->harga_awal) }}</span>
                </div>
            </div>
            <!-- /grid_item -->
        </div>
        @endforeach
       
    </div>
    <!-- /row -->
</div>
<!-- /container -->
@foreach ($gs as $gs)
    

<div class="featured lazy" data-bg="url({{ asset('admin/gs/'.$gs->banner_mid) }})">
    <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
        <div class="container margin_60">
            <div class="row justify-content-center justify-content-md-start">
                <div class="col-lg-6 wow" data-wow-offset="150">
                    <h3>Armor<br>Air Color 720</h3>
                    <p>Lightweight cushioning and durable support with a Phylon midsole</p>
                    <div class="feat_text_block">
                        <div class="price_box">
                            <span class="new_price">$90.00</span>
                            <span class="old_price">$170.00</span>
                        </div>
                        <a class="btn_1" href="listing-grid-1-full.html" role="button">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- /featured -->

<div class="container margin_60_35">
    <div class="main_title">
        <h2>Lelang Terbaru</h2>
        <p>Cum doctus civibus efficiantur in imperdiet deterruisset</p>
    </div>
    <div class="owl-carousel owl-theme products_carousel">
        <div class="item">
            <div class="grid_item">
                <span class="ribbon new">New</span>
                <figure>
                    <a href="product-detail-1.html">
                        <img class="owl-lazy" src="{{ asset('front/img/products/product_placeholder_square_medium.jpg') }}" data-src="{{ asset('front/img/products/shoes/4.jpg') }}" alt="">
                    </a>
                </figure>
                <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
                <a href="product-detail-1.html">
                    <h3>ACG React Terra</h3>
                </a>
                <div class="price_box">
                    <span class="new_price">$110.00</span>
                </div>
                <ul>
                    <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                    <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
                    <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                </ul>
            </div>
            <!-- /grid_item -->
        </div>
        <!-- /item -->
        <div class="item">
            <div class="grid_item">
                <span class="ribbon new">New</span>
                <figure>
                    <a href="product-detail-1.html">
                        <img class="owl-lazy" src="{{ asset('front/img/products/product_placeholder_square_medium.jpg') }}" data-src="{{ asset('front/img/products/shoes/5.jpg') }}" alt="">
                    </a>
                </figure>
                <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
                <a href="product-detail-1.html">
                    <h3>Air Zoom Alpha</h3>
                </a>
                <div class="price_box">
                    <span class="new_price">$140.00</span>
                </div>
                <ul>
                    <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                    <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
                    <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                </ul>
            </div>
            <!-- /grid_item -->
        </div>
        <!-- /item -->
        <div class="item">
            <div class="grid_item">
                <span class="ribbon hot">Hot</span>
                <figure>
                    <a href="product-detail-1.html">
                        <img class="owl-lazy" src="{{ asset('front/img/products/product_placeholder_square_medium.jpg') }}" data-src="{{ asset('front/img/products/shoes/8.jpg') }}" alt="">
                    </a>
                </figure>
                <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
                <a href="product-detail-1.html">
                    <h3>Air Color 720</h3>
                </a>
                <div class="price_box">
                    <span class="new_price">$120.00</span>
                </div>
                <ul>
                    <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                    <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
                    <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                </ul>
            </div>
            <!-- /grid_item -->
        </div>
        <!-- /item -->
        <div class="item">
            <div class="grid_item">
                <span class="ribbon off">-30%</span>
                <figure>
                    <a href="product-detail-1.html">
                        <img class="owl-lazy" src="{{ asset('front/img/products/product_placeholder_square_medium.jpg') }}" data-src="{{ asset('front/img/products/shoes/2.jpg') }}" alt="">
                    </a>
                </figure>
                <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
                <a href="product-detail-1.html">
                    <h3>Okwahn II</h3>
                </a>
                <div class="price_box">
                    <span class="new_price">$90.00</span>
                    <span class="old_price">$170.00</span>
                </div>
                <ul>
                    <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                    <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
                    <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                </ul>
            </div>
            <!-- /grid_item -->
        </div>
        <!-- /item -->
        <div class="item">
            <div class="grid_item">
                <span class="ribbon off">-50%</span>
                <figure>
                    <a href="product-detail-1.html">
                        <img class="owl-lazy" src="{{ asset('front/img/products/product_placeholder_square_medium.jpg') }}" data-src="{{ asset('front/img/products/shoes/3.jpg') }}" alt="">
                    </a>
                </figure>
                <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
                <a href="product-detail-1.html">
                    <h3>Air Wildwood ACG</h3>
                </a>
                <div class="price_box">
                    <span class="new_price">$75.00</span>
                    <span class="old_price">$155.00</span>
                </div>
                <ul>
                    <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                    <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
                    <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                </ul>
            </div>
            <!-- /grid_item -->
        </div>
        <!-- /item -->
    </div>
    <!-- /products_carousel -->
</div>
<!-- /container -->
@endsection