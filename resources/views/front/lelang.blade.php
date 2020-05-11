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
<!-- /top_banner -->
@endforeach

    <div id="stick_here"></div>		
    <div class="toolbox elemento_stick">
        <div class="container">
            <div class="col-xl-6 col-lg-7 col-md-6 d-none d-md-block">
                <div class="custom-search-input">
                    <input type="text" placeholder="Search over 10.000 products">
                    <button type="submit"><i class="header-icon_search_custom"></i></button>
                </div>
            </div>
        <div class="collapse" id="filters"><div class="row small-gutters filters_listing_1">
        </div></div>
        </div>
    </div>
    <!-- /toolbox -->

    <div class="container margin_30">
    <div class="row small-gutters">
        <div class="col-6 col-md-4 col-xl-3">
            <div class="grid_item">
                <figure>
                    <a href="product-detail-1.html">
                        <img class="img-fluid lazy" src="{{ asset('front/img/products/product_placeholder_square_medium.jpg') }}" data-src="{{ asset('front/img/products/shoes/1.jpg') }}" alt="">
                    </a>
                    <div data-countdown="2020/05/10" class="countdown"></div>
                </figure>
                <a href="product-detail-1.html">
                    <h3>Tuna Super</h3>
                </a>
                <div class="price_box">
                    <span>Open Bid </span><span class="new_price">Rp. 20.000.000</span>
                </div>
            </div>
            <!-- /grid_item -->
        </div>
        <!-- /col -->
        
        <div class="col-6 col-md-4 col-xl-3">
            <div class="grid_item">
                <figure>
                    <a href="product-detail-1.html">
                        <img class="img-fluid lazy" src="{{ asset('front/img/products/product_placeholder_square_medium.jpg') }}" data-src="{{ asset('front/img/products/shoes/1.jpg') }}" alt="">
                    </a>
                    <div data-countdown="2020/05/10" class="countdown"></div>
                </figure>
                <a href="product-detail-1.html">
                    <h3>Tuna Super</h3>
                </a>
                <div class="price_box">
                    <span>Open Bid </span><span class="new_price">Rp. 20.000.000</span>
                </div>
            </div>
            <!-- /grid_item -->
        </div>
        <!-- /col -->
        
        <div class="col-6 col-md-4 col-xl-3">
            <div class="grid_item">
                <figure>
                    <a href="product-detail-1.html">
                        <img class="img-fluid lazy" src="{{ asset('front/img/products/product_placeholder_square_medium.jpg') }}" data-src="{{ asset('front/img/products/shoes/1.jpg') }}" alt="">
                    </a>
                    <div data-countdown="2020/05/10" class="countdown"></div>
                </figure>
                <a href="product-detail-1.html">
                    <h3>Tuna Super</h3>
                </a>
                <div class="price_box">
                    <span>Open Bid </span><span class="new_price">Rp. 20.000.000</span>
                </div>
            </div>
            <!-- /grid_item -->
        </div>
        <!-- /col -->
        
        <div class="col-6 col-md-4 col-xl-3">
            <div class="grid_item">
                <figure>
                    <a href="product-detail-1.html">
                        <img class="img-fluid lazy" src="{{ asset('front/img/products/product_placeholder_square_medium.jpg') }}" data-src="{{ asset('front/img/products/shoes/1.jpg') }}" alt="">
                    </a>
                    <div data-countdown="2020/05/10" class="countdown"></div>
                </figure>
                <a href="product-detail-1.html">
                    <h3>Tuna Super</h3>
                </a>
                <div class="price_box">
                    <span>Open Bid </span><span class="new_price">Rp. 20.000.000</span>
                </div>
            </div>
            <!-- /grid_item -->
        </div>
        <!-- /col -->
        
        <div class="col-6 col-md-4 col-xl-3">
            <div class="grid_item">
                <figure>
                    <a href="product-detail-1.html">
                        <img class="img-fluid lazy" src="{{ asset('front/img/products/product_placeholder_square_medium.jpg') }}" data-src="{{ asset('front/img/products/shoes/1.jpg') }}" alt="">
                    </a>
                    <div data-countdown="2020/05/10" class="countdown"></div>
                </figure>
                <a href="product-detail-1.html">
                    <h3>Tuna Super</h3>
                </a>
                <div class="price_box">
                    <span>Open Bid </span><span class="new_price">Rp. 20.000.000</span>
                </div>
            </div>
            <!-- /grid_item -->
        </div>
        <!-- /col -->
        
        <div class="col-6 col-md-4 col-xl-3">
            <div class="grid_item">
                <figure>
                    <a href="product-detail-1.html">
                        <img class="img-fluid lazy" src="{{ asset('front/img/products/product_placeholder_square_medium.jpg') }}" data-src="{{ asset('front/img/products/shoes/1.jpg') }}" alt="">
                    </a>
                    <div data-countdown="2020/05/10" class="countdown"></div>
                </figure>
                <a href="product-detail-1.html">
                    <h3>Tuna Super</h3>
                </a>
                <div class="price_box">
                    <span>Open Bid </span><span class="new_price">Rp. 20.000.000</span>
                </div>
            </div>
            <!-- /grid_item -->
        </div>
        <!-- /col -->
        
        <div class="col-6 col-md-4 col-xl-3">
            <div class="grid_item">
                <figure>
                    <a href="product-detail-1.html">
                        <img class="img-fluid lazy" src="{{ asset('front/img/products/product_placeholder_square_medium.jpg') }}" data-src="{{ asset('front/img/products/shoes/1.jpg') }}" alt="">
                    </a>
                    <div data-countdown="2020/05/10" class="countdown"></div>
                </figure>
                <a href="product-detail-1.html">
                    <h3>Tuna Super</h3>
                </a>
                <div class="price_box">
                    <span>Open Bid </span><span class="new_price">Rp. 20.000.000</span>
                </div>
            </div>
            <!-- /grid_item -->
        </div>
        <!-- /col -->
        
        <div class="col-6 col-md-4 col-xl-3">
            <div class="grid_item">
                <figure>
                    <a href="product-detail-1.html">
                        <img class="img-fluid lazy" src="{{ asset('front/img/products/product_placeholder_square_medium.jpg') }}" data-src="{{ asset('front/img/products/shoes/1.jpg') }}" alt="">
                    </a>
                    <div data-countdown="2020/05/10" class="countdown"></div>
                </figure>
                <a href="product-detail-1.html">
                    <h3>Tuna Super</h3>
                </a>
                <div class="price_box">
                    <span>Open Bid </span><span class="new_price">Rp. 20.000.000</span>
                </div>
            </div>
            <!-- /grid_item -->
        </div>
        <!-- /col -->			
    </div>
    <!-- /row -->
        
    <div class="pagination__wrapper">
        <ul class="pagination">
            <li><a href="#0" class="prev" title="previous page">&#10094;</a></li>
            <li>
                <a href="#0" class="active">1</a>
            </li>
            <li>
                <a href="#0">2</a>
            </li>
            <li>
                <a href="#0">3</a>
            </li>
            <li>
                <a href="#0">4</a>
            </li>
            <li><a href="#0" class="next" title="next page">&#10095;</a></li>
        </ul>
    </div>
        
</div>
<!-- /container -->
@endsection

@section('script')
    <!-- SPECIFIC SCRIPTS -->
	<script src="{{ asset('front/js/sticky_sidebar.min.js') }}"></script>
	<script src="{{ asset('front/js/specific_listing.js') }}"></script>
		
@endsection