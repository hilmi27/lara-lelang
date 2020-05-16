@extends('layouts.admin')

@section('style')
     <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.css') }}">
  
  <style>
    .picture-container {
   position: relative;
   cursor: pointer;
   text-align: center;
 }
  .picture {
   width: 800px;
   height: 400px;
   background-color: #999999;
   border: 4px solid #CCCCCC;
   color: #FFFFFF;
   /* border-radius: 50%; */
   margin: 5px auto;
   overflow: hidden;
   transition: all 0.2s;
   -webkit-transition: all 0.2s;
 }
 .picture:hover {
   border-color: #2ca8ff;
 }
 
 .picture-src {
   width: 100%;
   height: 100%;
 }
 
 </style>

@endsection

@section('content')

<div class="content-header">

  <div class="container-fluid">

    <div class="row mb-2">

      <div class="col-sm-6">

        <h1 class="m-0 text-dark">Data Lelang</h1>

      </div>

      <div class="col-sm-6">

        <ol class="breadcrumb float-sm-right">

          <li class="breadcrumb-item"><a href="#">Home</a></li>

          <li class="breadcrumb-item active">Data Lelang</li>

        </ol>

      </div>

    </div>

  </div>

</div>

<div class="card card-primary">

    <div class="card-body">

        <div class="col-md-6 form-group">

            <label for="photo">Photo</label>

            <div class="picture">

                <img src="{{ $lelang->photo ? asset('admin/lelang/'.$lelang->photo):'http://fulldubai.com/SiteImages/noimage.png'}}" class="picture-src" id="wizardPicturePreview" height="200px" width="400px" title=""/>

            </div>

            <h6>Pilih Cover</h6>

        </div>

        <div class="row">

            <div class="col-md-5">

                <div class="form-group">

                    <label for="title">Title</label>  
    
                    <input type="text" name="title" value="{{$lelang->title}}" class="form-control" disabled>
    
                </div>  
     
                <div class="form-group">

                    <label for="nama">Ikan</label>

                    <input type="text" value="{{ $lelang->jenis_ikan }}" class="form-control" disabled>

                </div>           
    
                <div class="form-group">

                    <label for="nama">Kualitas</label>

                    <input type="text" value="{{ $lelang->kualitas }}" class="form-control" disabled>

                </div>       
    
                <div class="form-group">

                    <label for="ukuran">Ukuran</label>

                    <input type="number" name="ukuran" value="{{$lelang->ukuran}}" class="form-control" disabled>

                </div> 

                <div class="form-group">

                    <label for="qty">Qty<span>(dalam kg)</span></label>

                    <input type="number" name="qty" value="{{$lelang->qty}}" class="form-control" disabled>

                </div>       
   
                <div class="form-group">

                    <label for="harga_awal">Harga Awal</label>

                    <input type="number" name="harga_awal" value="{{$lelang->harga_awal}}" class="form-control" disabled>

                </div>     
    
                <div class="form-group">

                    <label for="tgl_lelang">Tanggal Lelang</label>

                    <input type="date" name="tgl_lelang" value="{{$lelang->tgl_lelang}}" class="form-control" disabled>

                </div> 

                <div class="form-group">

                    <label for="detail">Detail</label>         
      
                    <textarea name="detail" id="detail"  class="form-control" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" disabled>{{ $lelang->detail}}</textarea>

                </div>      
      
                <div class="form-group">

                    <label for="status">Status</label>

                    <input type="text" value="{{ $lelang->status }}" class="form-control" disabled>

                </div>       
   
            </div>
   
            <div class="col-md-6">
   
                <label for="">List Penawaran</label>
   
                <table class="table table-hover">

                    <thead>

                        <tr>

                            <th>Username</th>

                            <th>Bidding</th>

                            <th>Contact</th>

                            <th>Action</th>

                        </tr>

                    </thead>

                    @foreach ($bid as $data)              
    
                    <tbody>      
      
                        <tr>    
         
                            <td>{{$data->user->name}}</td> 
            
                            <td>Rp. {{number_format( $data->bid) }}</td>
            
                            <td>
            
                                @php
                                $num = (int)$data->user->no_hp;
                                @endphp
                                <a href="mailto:{{ $data->user->email }}" class="btn btn-danger btn-sm"> Email</a>

                                <a href="https://wa.me/62{{ $num }}" class="btn btn-success btn-sm"> Whatsapp</a>

                            </td>

                            <td>

                                {{-- <a href="#" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Set pemenang</a> --}}
                                <form method="POST" action="{{route('admin.lelang.setpemenang',$lelang->id)}}" class="d-inline" onsubmit="return confirm('Jadikan pemenang lelang ?')">

                                    @csrf
                
                                        <input type="hidden" name="pemenang" value="{{ $data->user->id }}">

                                        <input type="hidden" name="harga_akhir" value="{{ $data->bid }}">
                
                                        <input type="submit" class="btn btn-success btn-sm">
                
                                </form>

                            </td>          
        
                        </tr>  
     
                    </tbody>

                    @endforeach           
       
                    @if (count($bid)==0)
       
                    <tr><td colspan='6' align='center'>Belum ada penawaran</td></tr>
       
                    @endif

                </table>

            </div>

        </div>
      
    </div>

</div>

@endsection

@section('script')
    <!-- Summernote -->
<script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>

<script>
    // Prepare the preview for profile picture
    $("#wizard-picture").change(function(){
      readURL(this);
  });
  //Function to show image before upload

function readURL(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
          $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
      }
      reader.readAsDataURL(input.files[0]);
  }
}
</script>

@endsection