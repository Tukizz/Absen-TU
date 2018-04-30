<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width,initial-scale=1" />
 <meta name="csrf-token" content="{{ csrf_token() }}">
 <title>Login | AbsenTU</title>
 
 <link rel="stylesheet" href="/css/materialize.min.css">
 <link rel="stylesheet" href="/css/icon.css">
 <script src="/js/jquery-3.2.1.min.js"></script>
 <style>
    body {
      display: flex;
      min-height: 100vh;
      flex-direction: column;
      background: url(/images/bgD.png) repeat;
    }

    main {
      flex: 1 0 auto;
    }

    .input-field input[type=text]:focus + label,
    .input-field input[type=password]:focus + label  {
      color: #2295f4 !important; 
    }

    .input-field input[type=text]:focus,
    .input-field input[type=password]:focus {
      border-bottom: 2px solid #2295f4 !important;
      box-shadow: none;
    }
 </style>
</head>
<body>
    <div class="section"></div>
    <main>
      <center>
        <h5 class="blue-text">Login Admin | AbsenTU</h5>
        <div class="section"></div>

        @if ($errors->any())
        <br><div class="container center" style="margin-top: -45px; width:370px;">
              @foreach ($errors->all() as $error)
                <div class="card-panel red" style="height: 10px;">
                  <span class="white-text">
                    <h5 style="margin-top: -12px;">{{ $error }}</h5>    
                  </span>
                </div>
              @endforeach
            </div><br>
        @endif

        <div class="container">
          <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

            <form class="col s12 m12" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
              <div class='row'>
                <div class='input-field col s12 m12'>
                  <input id="icon_prefix" type="text" class="validate" name="username" value="{{ old('username') }}">
                  <label for='username'>Username</label>
                </div>
              </div>

              <div class='row'>
                <div class='input-field col s12 m12'>
                  <input id="icon_telephone" type="password" class="validate" name="password">
                  <label for='password'>Password</label>
                </div>
                <label style='padding-right:30%;'></label>
              </div>

              <br />
              <center>
                <div class='row'>
                  <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect blue'>Login</button>
                </div>
              </center>
            </form>
          </div>
        </div>
      </center>
    </main>
<script src="/js/materialize.min.js"></script>
</body>
</html>







{{-- <!DOCTYPE html>
<head>
<title>Absen TU</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="/css/bootstrap.css">
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="/css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="/css/font.css" type="text/css"/>
<link href="/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
</head>
<body class="signup-body">
        <div class="agile-signup">  
            
            <div class="content2">
                <div class="grids-heading gallery-heading signup-heading">
                    <h2>Login</h2>
                </div>
                <form action="{{ route('login') }}" method="post">
                    {{ csrf_field() }}
                    <input type="text" name="username" value="{{ old('username') }}" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}">
                                @if ($errors->has('username'))
                                  <span class="help-block">
                                     <strong>{{ $errors->first('username') }}</strong>
                                  </span>
                                @endif
                    <input type="password" name="password" id="password" required onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                    <input type="submit" class="register" value="Login">

                </form>
            </div>
            
            <!-- footer -->
            <div class="copyright">
                <p>© 2018 RPL2'13 . All Rights Reserved .</p>
            </div>
            <!-- //footer -->
            
        </div>
    <script src="/js/proton.js"></script>
</body>
</html>

 --}}