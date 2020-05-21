@extends('layouts.front')
@section('content')

<div class="container margin_30" style="padding-top: 115px; padding-bottom: 120px">

    <div class="page_header">

    </div>

    <!-- /page_header -->

    <div class="row justify-content-center">

        <div class="col-xl-4 col-lg-4 col-md-8">

            <div class="box_account">

                <h3 class="client">Reset Password</h3>

                <div class="form_container">

                    @if (session('status'))

                    <div class="alert alert-success" role="alert">

                        {{ session('status') }}

                    </div>

                    @endif

                    <form method="POST" action="{{ route('password.email') }}">

                        @csrf

                        <div class="form-group">

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Masukkan email terdaftar">

                            @error('email')

                            <span class="invalid-feedback" role="alert">

                                <strong>{{ $message }}</strong>

                            </span>

                            @enderror

                        </div>

                        <div class="text-center">                        
        
                            <input type="submit" value="Reset Password" class="btn_1 full-width">            
        
                        </div>

                    </form>

                    <br>

                    <br>

                    <br>

                    <br>

                    <br>

                </div>

            </div>
           
        </div>

    </div>
 
</div>

@endsection