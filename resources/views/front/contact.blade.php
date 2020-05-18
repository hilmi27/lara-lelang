@extends('layouts.front')

@section('style')
    <!-- SPECIFIC CSS -->
    <link href="{{ asset('front/css/contact.css') }}" rel="stylesheet">

@endsection

@section('content')
    
@foreach ($gs as $gs)
    
<div class="container margin_60">
    
    <div class="main_title">

        <h2>Contact</h2>

    </div>

    <div class="row justify-content-center">

        <div class="col-lg-4">

            <div class="box_contacts">

                <i class="ti-support"></i>

                <h2>Call Center</h2>

                <a href="tel:{{ $gs->phone }}">{{ $gs->phone }}</a>               
      
            </div>
      
        </div>
      
        <div class="col-lg-4">
      
            <div class="box_contacts">
      
                <i class="ti-map-alt"></i>
      
                <h2>Office</h2>
      
                <div>{{ $gs->address }}</div>
      
            </div>
      
        </div>
      
        <div class="col-lg-4">
      
            <div class="box_contacts">
      
                <i class="ti-package"></i>
      
                <h2>Email</h2>
      
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

    <div class="container margin_60_35">

        <div class="row">        
 
            <div class="col-lg-12 col-md-12 add_bottom_25">
 
                <h2>Cabang</h2>
 
                <table class="table table-hover">

                    <thead>
        
                        <tr>
        
                            <th>No.</th>
        
                            <th>Cabang</th>

                            <th>Alamat</th>

                            <th>Kontak</th>
        
                        </tr>
        
                    </thead>
                  
                    <tbody>
                  
                        <tr>
                  
                            <td>1.</td>
                  
                            <td>Jakarta</td>

                            <td>Perum Perikanan Cabang Jakarta Jl.Muara Baru Ujung Penjaringan Jakarta Utara 14440</td>

                            <td>(+6221) 6694822</td>
                  
                        </tr>

                        <tr>
                  
                            <td>2.</td>
                  
                            <td>Medan</td>

                            <td>Pelabuhan Perikanan Samudera Cabang Belawan, kota Medan, Sumatera Utara</td>

                            <td>-</td>
                  
                        </tr>

                        <tr>
                  
                            <td>3.</td>
                  
                            <td>Brondong</td>

                            <td>Pelabuhan Perikanan Nusantara Brondong, Kec. Brondong, Kabupaten Lamongan, Jawa Timur 62263</td>

                            <td>-</td>
                  
                        </tr>

                        <tr>
                  
                            <td>4.</td>
                  
                            <td>Pekalongan</td>

                            <td>Jl. Wage Rudof Supratman No.2, Panjang Wetan, Pekalongan Utara, Kota Pekalongan, Jawa Tengah 51141</td>

                            <td>-</td>
                  
                        </tr>

                        <tr>
                  
                            <td>5.</td>
                  
                            <td>Pemangkat</td>

                            <td>Pelabuhan Perikanan Nusantara Pemangkat, Provinsi Kalimantan Barat</td>

                            <td>-</td>
                  
                        </tr>

                        <tr>
                  
                            <td>6.</td>
                  
                            <td>Prigi</td>

                            <td>JL Tasik Madu, Gares Kidul, Prigi, Watulimo, Kabupaten Trenggalek, Jawa Timur 66382</td>

                            <td>-</td>
                  
                        </tr>

                        <tr>
                  
                            <td>7.</td>
                  
                            <td>Karawang</td>

                            <td>Pusakajaya Utara, Cilebar, Kabupaten Karawang, Jawa Barat 41353</td>

                            <td>-</td>
                  
                        </tr>
                  
                    </tbody>
        
                </table>
            </div>
 
        </div>

    </div>

</div>

@endforeach

@endsection