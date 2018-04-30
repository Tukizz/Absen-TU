<!DOCTYPE html>
<head>
<title>Absen TU</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Colored Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.css">
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
</head>
<body class="signup-body">
        <div class="agile-signup">  
        
            <div class="content2">
                <div class="grids-heading gallery-heading signup-heading">
                    <h2>Register</h2>
                </div>
                <form method="POST" action="{{ route('register') }}">{{ csrf_field() }}
                    <input type="text" id="name" name="name" value="{{ old('name') }}" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}">
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    <input type="text" name="username" value="{{ old('username') }}" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}">
                        @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    <input type="email" id="email" name="email" value="{{ old('username') }}" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    <input type="password" id="password" name="password" required onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    <input type="password" id="password-confirm" name="password_confirmation" required onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
                    <input type="submit" class="register" value="Sign Up">
                </form>
                <div class="signin-text">
                    <div class="text-right">
                        <p><a href="/login"> Already Have an Account</a></p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            
            <!-- footer -->
            <div class="copyright">
                <p>© 2018 RPL2'13 . All Rights Reserved .</p>
            </div>
            <!-- //footer -->
            
        </div>
    <script src="js/proton.js"></script>
</body>
</html>
