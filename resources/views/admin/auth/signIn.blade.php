<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from adminex.themebucket.net/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Sep 2015 19:56:16 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="#" type="image/png">

    <title>Login</title>

    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/style-responsive.css')}}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login-body">

<div class="container">

<form class="form-signin" method="POST" action="{{ route('login') }}">
    @csrf
    <div class="form-signin-heading text-center">
        <h1 class="sign-title">Sign In</h1>
        <img style="height:80px;width:180px" src="{{ asset('admin/image/logo/log-logo.png') }}" alt=""/>
    </div>
    <div class="login-wrap">
        <input id="email" type="email" Placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
            <span class="invalid-feedback" style="color:red" role="alert">
                {{ $message }}
            </span>
        @enderror
        <input id="password" style="margin-top:10px" type="password" Placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        @error('password')
            <span class="invalid-feedback" style="color:red" role="alert">
                {{ $message }}
            </span>
        @enderror

        <button class="btn btn-lg btn-login btn-block" type="submit">
            <i class="fa fa-check"></i>
        </button>

        <div class="registration">
            Not a member yet?
            <a class="" href="registration.html">
                Signup
            </a>
        </div>
        <label class="checkbox">
        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            Remember me
            <span class="pull-right">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        Forgot Your Password
                    </a>
                @endif

            </span>
        </label>

    </div>
</form>
<!--==================================-->



<!--===================================-->

</div>



<!-- Placed js at the end of the document so the pages load faster -->

<!-- Placed js at the end of the document so the pages load faster -->
<script src="{{ asset('admin/js/jquery-1.10.2.min.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/js/modernizr.min.js') }}"></script>

</body>

<!-- Mirrored from adminex.themebucket.net/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Sep 2015 19:56:16 GMT -->
</html>
