<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
      <meta name="csrf-token" content="{{ csrf_token() }}" />
      <meta name="userId" content="{{ Auth::check() ? Auth::user()->id : ''}}">

      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta content="telephone=no" name="format-detection">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>CSR Limited | @yield('title')</title>

      <!-- Latest compiled and minified CSS -->
      <link rel="shortcut icon" href="{{ asset('images/fav-icon-32.ico') }}" type="image/x-icon" />
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Montserrat:300,400,500,600,700,800&amp;subset=latin-ext" rel="stylesheet">
      <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css"> -->
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/css/swiper.min.css">
      <link rel="stylesheet" type="text/css" href="{{ asset('css/fontawesome.min.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('css/datepicker.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('css/daterangepicker.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
      <link rel="stylesheet" href="{{ asset('css/bootstrap-timepicker.min.css') }}"  type="text/css" />
      <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('js/jquery-3.4.1.slim.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('js/moment.min.js') }}"></script>
      <!-- <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script> -->
      <script type="text/javascript" src="{{ asset('js/datepicker.js') }}"></script>
      <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('js/daterangepicker.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('js/bootstrap-timepicker.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js"></script>
  </head>

  <body class="bg-dark-blue">
    <div class="container section-login">
        <div class="row vh-100 align-items-sm-center">
            <div class="col-sm-6 offset-sm-3">
                <div class="text-center pb-5">
                    <img src="{{ asset('images/cospace-header.png') }}" width="322" height="45" class="img-fluid mx-auto" alt=""/>
                </div>

                <div class="text-light link-light">
                    <div class="form-group">
                        <h2><strong>Welcome</strong></h2>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                      @if(isset($error))
                        <p class="alert alert-danger" style="color: #F00;"><?php echo $error; ?></p>
                      @endif
                      @csrf
                      <div class="form-group">
                          <input  id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Username">
                          <input type="hidden" name="role" value="{{ $type }}">
                          @if($errors->has('username'))
                            <div class="error" style="color: #dc3545;">{{ $errors->first('username') }}</div>
                          @endif
                      </div>
                      <div class="form-group">
                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                          @if($errors->has('password'))
                            <div class="error" style="color: #dc3545;">{{ $errors->first('password') }}</div>
                          @endif
                      </div>
                    <!-- <div class="form-group clearfix small d-table w-100">
                        <div class="form-check custom-checkbox d-table-cell align-top">
                            <input class="form-check-input" type="checkbox" value="" name="remember" id="remember"{{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remembercheck">Remember Me</label>
                        </div>
                        <div class="d-table-cell text-right align-top"><a href="#" data-toggle="modal" data-target="#forget-password">Forgot password?</a></div>
                    </div> -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-blue" style="border-radius: 5px;">Log in</button>
                    </div>
                    @if(Session::has('error'))
                      <p class="alert alert-danger" style="color: #F00;">{{ Session::get('error') }}</p>
                    @endif
                    </form>
                </div>
            </div>
        </div>
        <div id="forget-password-modal">
        <div class="modal fade align-middle" id="forget-password" role="dialog" style="display: none;">
            <div class="modal-dialog">
                <form role="form" action="#">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Reset your password</h3>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="email" class="form-control" id="email-pwd" placeholder="Email Address" name="email-pwd">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-blue">Reset Password</button> <button type="button" class="btn btn-blue-dark" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
  <style media="screen">
    .form-control{
      border-radius: 5px;
    }
  </style>
  </body>
</html>
