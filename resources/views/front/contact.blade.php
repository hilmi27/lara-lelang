@extends('layouts.front')

@section('style')
    <!-- SPECIFIC CSS -->
    <link href="{{ asset('front/css/contact.css') }}" rel="stylesheet">

@endsection

@section('content')
    
@foreach ($gs as $gs)
    
<div class="container margin_60">
    
    <div class="main_title">

        <h2>Kontak Kami</h2>

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
      
                <h2>Kantor Pusat</h2>
      
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

                            <th>Email</th>

                            <th>Telephone</th>
        
                        </tr>
        
                    </thead>
                  
                    @php
                        $no = 0;
                    @endphp
                    
                    <tbody>
                  
                        @foreach ($cabang as $data)
                            
                        <tr>
                  
                            <td>{{ ++$no }}</td>
                  
                            <td>{{ $data->name }}</td>

                            <td>{{ $data->address }}.
                            @if (!empty($data->link_maps))
                            <a href="{{ $data->link_maps }}" target="_blank">Lihat Maps</a>   
                            @endif
                            </td>

                            <td>{{ $data->email }}</td>
                            
                            <td>{{ $data->phone }}</td>
                  
                        </tr>

                        @endforeach

                    </tbody>
        
                </table>
            </div>
 
        </div>

    </div>

</div>

@endforeach

@endsection