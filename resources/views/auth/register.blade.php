@extends('layouts.front')

@section('content')

<div class="container margin_30">

    <div class="page_header">

    </div>

    <!-- /page_header -->

    <div class="row justify-content-center">

        <div class="col-xl-6 col-lg-6 col-md-8">

            <div class="box_account">

                <h3 class="new_client">Register</h3>

                <div class="form_container">

                    <form method="POST" action="{{ route('register') }}">

                        @csrf   

                        <div class="private box">

                            <div class="row no-gutters">

                                <div class="col-md-12">

                                    <div class="form-group">

                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nama">

                                        @error('name')

                                        <span class="invalid-feedback" role="alert">

                                            <strong>{{ $message }}</strong>

                                        </span>

                                        @enderror

                                    </div>

                                    <div class="form-group">

                                        <input type="number" class="form-control @error('no_ktp') is-invalid @enderror" name="no_ktp" value="{{ old('no_ktp') }}" placeholder="No. KTP">

                                        @error('no_ktp')

                                        <span class="invalid-feedback" role="alert">

                                            <strong>{{ $message }}</strong>

                                        </span>

                                        @enderror

                                    </div>

                                    <div class="form-group">

                                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" placeholder="Alamat">

                                        @error('alamat')

                                        <span class="invalid-feedback" role="alert">

                                            <strong>{{ $message }}</strong>

                                        </span>

                                        @enderror

                                    </div>

                                    <div class="form-group">

                                        <input type="number" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ old('no_hp') }}" placeholder="No. HP">

                                        @error('no_hp')

                                        <span class="invalid-feedback" role="alert">

                                            <strong>{{ $message }}</strong>

                                        </span>

                                        @enderror
 
                                    </div>
 
                                    <div class="form-group">
 
                                        <input type="text" class="form-control @error('unit_kerja') is-invalid @enderror" name="unit_kerja" value="{{ old('unit_kerja') }}" placeholder="Unit Kerja">
 
                                        @error('unit_kerja')
 
                                        <span class="invalid-feedback" role="alert">
 
                                            <strong>{{ $message }}</strong>
 
                                        </span>
 
                                        @enderror
 
                                    </div>
 
                                    <div class="form-group">
 
                                        <input type="text" class="form-control @error('lok_simpanan') is-invalid @enderror" name="lok_simpanan" value="{{ old('lok_simpanan') }}" placeholder="Lokasi Simpanan">
 
                                        @error('lok_simpanan')
 
                                        <span class="invalid-feedback" role="alert">
 
                                            <strong>{{ $message }}</strong>
                                        
                                        </span>
                                
                                        @enderror
                                
                                    </div>

                                    <hr>

                                    <!-- /company -->

                                    <div class="form-group">

                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                                        @error('email')

                                        <span class="invalid-feedback" role="alert">

                                            <strong>{{ $message }}</strong>

                                        </span>

                                        @enderror

                                    </div>

                                    <div class="form-group">

                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                                        @error('password')

                                        <span class="invalid-feedback" role="alert">

                                            <strong>{{ $message }}</strong>

                                        </span>

                                        @enderror

                                    </div>

                                    <div class="form-group">

                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Password Confirmation">

                                    </div>

                                    <hr>

                                </div>

                            </div>

                            <!-- /row -->                        
         
                        </div>

                        <div class="text-center"><input type="submit" value="Register" class="btn_1 full-width"></div>

                    </form>

                </div>

                <!-- /form_container -->

            </div>

            <!-- /box_account -->

        </div>

    </div>

    <!-- /row -->

</div>

@endsection