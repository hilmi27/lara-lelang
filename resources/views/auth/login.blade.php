@extends('layouts.front')
@section('content')

<div class="container margin_30" style="padding-top: 115px; padding-bottom: 120px">

    <div class="page_header">

    </div>

    <!-- /page_header -->

    <div class="row justify-content-center">

        <div class="col-xl-4 col-lg-4 col-md-8">

            <div class="box_account">

                <h3 class="client">Login</h3>

                <div class="form_container">

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                    <div class="form-group">

                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>

                    <div class="form-group">

                        <input type="password" class="form-control" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    </div>

                    <div class="clearfix add_bottom_15">

                        <div class="checkboxes float-left">

                            <label class="container_check">Remember me

                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <span class="checkmark"></span>

                            </label>

                        </div>

                    </div>

                    <div class="text-center"><input type="submit" value="Log In" class="btn_1 full-width"></div>

                    <a href="{{ route('register') }}">Belum punya akun ? klik disini untuk register</a>
                    
                    <div id="forgot_pw">

                        <div class="form-group">

                            <input type="email" class="form-control" name="email_forgot" id="email_forgot" placeholder="Type your email">

                        </div>

                        <p>A new password will be sent shortly.</p>

                        <div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>

                    </div>

                </form>

                </div>

                <!-- /form_container -->

            </div>
           
        </div>

    </div>
 
    <!-- /row -->
 
</div>

@endsection