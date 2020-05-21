<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">

    <meta name="author" content="Ansonika">

    <title>{{ $gs->title }}</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ asset('admin/gs/'.$gs->favicon) }}" type="image/x-icon">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="{{ asset('front/css/bootstrap.custom.min.css') }}" rel="stylesheet">

    <link href="{{ asset('front/css/style.css') }}" rel="stylesheet">

	<!-- SPECIFIC CSS -->
    <link href="{{ asset('front/css/home_1.css') }}" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="{{ asset('front/css/custom.css') }}" rel="stylesheet">

    @yield('style')

</head>

<body>
	
	<div id="page">		

        <header class="version_1">

            <div class="layer"></div>

            <div class="main_header">

                <div class="container">

                    <div class="row small-gutters">

                        <div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">

                            <div id="logo">

                                <a href="{{ route('front') }}">
       
                                    <img src="{{ asset('admin/gs/'.$gs->logo) }}" alt="" width="100" height="35">            
          
                                </a>

                            </div>

                        </div>

                        <nav class="col-xl-6 col-lg-7">

                            <a class="open_close" href="javascript:void(0);">

                                <div class="hamburger hamburger--spin">

                                    <div class="hamburger-box">

                                        <div class="hamburger-inner"></div>

                                    </div>

                                </div>

                            </a>

                            <div class="main-menu">

                                <div id="header_menu">

                                    <a href="{{ route('front') }}">
                                        
                                        <img src="{{ asset('img/logo_black.svg') }}" alt="" width="100" height="35">
                                
                                    </a>

                                    <a href="#" class="open_close" id="close_in"><i class="ti-close"></i></a>

                                </div>

                                <ul>

                                    <li>                
         
                                        <a href="{{ route('front') }}">Beranda</a>       
        
                                    </li>

                                    <li>                
        
                                        <a href="{{ route('front.lelang') }}">Lelang</a>        
                   
                                    </li>

                                    <li>                
                   
                                        <a href="{{ route('front.contact') }}">Kontak Kami</a>

                                    </li> 
               
                                </ul> 
                
                            </div>

                        </nav>                
                   
                        <div class="col-xl-3 col-lg-2 d-lg-flex align-items-center justify-content-end text-right">     
                
                            <ul class="top_tools">
                
                                <li>

                                    <div class="dropdown dropdown-access">                
                     
                                        <a href="account.html" class="access_link"><span>Akun</span></a>

                                        <div class="dropdown-menu">

                                            {{-- @if (Auth::user()->check) --}}

                                            @guest

                                            <a href="{{ route('login') }}" class="btn_1">Masuk atau Daftar</a>                                        
                  
                                            @else
                  
                                            <a href="#" class="btn_1">{{ Auth::user()->name }}</a>

                                            <ul>                                
                      
                                                {{-- <li>

                                                    <a href="account.html"><i class="ti-user"></i>My Profile</a>                
                        
                                                </li> --}}

                                                <li>                
                         
                                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">Keluar</a>    
                                                    
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                          
                                                </li>

                                            </ul>

                                            @endguest            
            
                                        </div>    
                
                                    </div>

                                </li>							
                    
                            </ul>

                        </div>                
            
                    </div>

                </div>        
   
            </div>

        </header>

        <main>    
       
            @yield('content')

        </main>

        <footer class="revealed">

            <div class="container">	    
      
                <hr>

                <div class="row add_bottom_25">    
          
                    <div class="col-lg-6">

                    </div>

                    <div class="col-lg-6">    
          
                        <ul class="additional_links">
              
                            {{-- <li><a href="#0">Terms and conditions</a></li>
             
                            <li><a href="#0">Privacy</a></li> --}}
             
                            <li><span>{{ $gs->footer }}</span></li>

                        </ul>    
             
                    </div>

                </div>    
    
            </div>

        </footer>

    </div>

    <div id="toTop"></div><!-- Back to top button -->	
    
<script src="{{ asset('front/js/common_scripts.min.js') }}"></script>

<script src="{{ asset('front/js/main.js') }}"></script>	

<!-- SPECIFIC SCRIPTS -->

<script src="{{ asset('front/js/carousel-home.min.js') }}"></script>

@yield('script')
</body>

</html>