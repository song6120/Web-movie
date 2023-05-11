<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
  <head>
    <title>
      Admin movie
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript">
      addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);

                      function hideURLbar() { window.scrollTo(0, 1); }
    </script>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('backend/css/bootstrap.css')}}" rel="stylesheet" type="text/css" />
    <!-- Custom CSS -->
    <link href="{{asset('backend/css/style.css')}}" rel="stylesheet" type="text/css" />
    <!-- font-awesome icons CSS -->
    <link href="{{asset('backend/css/font-awesome.css')}}" rel="stylesheet" />
    <!-- //font-awesome icons CSS-->
    <!-- side nav css file -->
    <link
      href="{{asset('backend/css/SidebarNav.min.css')}}"
      media="all"
      rel="stylesheet"
      type="text/css"
    />
    <!-- //side nav css file -->
    <!-- js-->
    <script src="{{asset('backend/js/jquery-1.11.1.min.js')}}"></script>
    <script src="{{asset('backend/js/modernizr.custom.js')}}"></script>
    <!--webfonts-->
    <link
      href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext"
      rel="stylesheet"
    />
    <!--//webfonts-->
    <!-- chart -->
    <script src="{{asset('backend/js/Chart.js')}}"></script>
    <!-- //chart -->
    <!-- Metis Menu -->
    <script src="{{asset('backend/js/metisMenu.min.js')}}"></script>
    <script src="{{asset('backend/js/custom.js')}}"></script>
    <link href="{{asset('backend/css/custom.css')}}" rel="stylesheet" />
    <!--//Metis Menu -->
    <style>
      #chartdiv {
        width: 100%;
        height: 295px;
      }
    </style>
    <!--pie-chart -->
    <!-- index page sales reviews visitors pie chart -->
    <script src="{{asset('backend/js/pie-chart.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function () {
        $('#demo-pie-1').pieChart({
          barColor: '#2dde98',
          trackColor: '#eee',
          lineCap: 'round',
          lineWidth: 8,
          onStep: function (from, to, percent) {
            $(this.element)
              .find('.pie-value')
              .text(Math.round(percent) + '%');
          },
        });

        $('#demo-pie-2').pieChart({
          barColor: '#8e43e7',
          trackColor: '#eee',
          lineCap: 'butt',
          lineWidth: 8,
          onStep: function (from, to, percent) {
            $(this.element)
              .find('.pie-value')
              .text(Math.round(percent) + '%');
          },
        });

        $('#demo-pie-3').pieChart({
          barColor: '#ffc168',
          trackColor: '#eee',
          lineCap: 'square',
          lineWidth: 8,
          onStep: function (from, to, percent) {
            $(this.element)
              .find('.pie-value')
              .text(Math.round(percent) + '%');
          },
        });
      });
    </script>
    <!-- //pie-chart -->
    <!-- index page sales reviews visitors pie chart -->
    <!-- requried-jsfiles-for owl -->
    <link href="{{asset('backend/css/owl.carousel.css')}}" rel="stylesheet" />
    <script src="{{asset('backend/js/owl.carousel.js')}}"></script>
    <script>
      $(document).ready(function () {
        $('#owl-demo').owlCarousel({
          items: 3,
          lazyLoad: true,
          autoPlay: true,
          pagination: true,
          nav: true,
        });
      });
    </script>
    <!-- //requried-jsfiles-for owl -->
  </head>
  <body style="background: antiquewhite;height: 100vh;display: flex;justify-content: center;align-items: center;">
{{--  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>  --}}
<div class="main-page login-page">
	<h2 class="title1">Đăng nhập</h2>
	<div class="widget-shadow">
		<div class="login-body">
			<form  method="POST" action="{{ route('login') }}">
                @csrf
                <div style="display: flex;flex-direction: column;justify-content: center;align-items: center;">
                    <div class="col-md-6" style="width: 80%;display: flex;">
                    <div style="height: 45px;width: 40px;border: 1px solid #dbdbdb;display: flex;justify-content: center;align-items: center;background: darkcyan;">
                      <i class="fa fa-user" style="font-size: 21px;color: whitesmoke;"></i>
                    </div>
                        <input style="height: 45px;" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Nhập tài khoản hoặc email" required autocomplete="email" autofocu>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>Tài khoản hoặc mật khẩu không chính xác!</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6" style="width: 80%;display: flex;">
                    <div style="height: 45px;width: 40px;border: 1px solid #dbdbdb;display: flex;justify-content: center;align-items: center;background: darkcyan;">
                      <i class="fa fa-lock" style="font-size: 21px;color: whitesmoke;"></i>
                    </div>
                        <input style="height: 45px;" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" class="lock" placeholder="Nhập mật khẩu" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>Tài khoản hoặc mật khẩu không chính xác!</strong>
                            </span>
                        @enderror
                    </div>
                </div>
				<div class="forgot-grid" style="margin-left: 68px;">
					<label class="checkbox"><input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}><i></i>{{ __('Nhớ mật khẩu') }}</label>
					<div class="clearfix"> </div>
				</div>
				<div class="row mb-0" style="display: flex;justify-content: center;align-items: center;">
                    <div class="col-md-8 offset-md-4" style="width: 80%;">
                        <button type="submit" class="btn btn-primary" style="margin-right: 140px;">
                            {{ __('Đăng nhập') }}
                        </button
                    </div>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Quên mật khẩu?
                            </a>
                        @endif
                </div>
			</form>
		</div>
	</div>
	
</div>
</body>
</html>