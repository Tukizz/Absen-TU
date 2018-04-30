<!DOCTYPE html>
<head>
<title>Admin Absen TU</title>
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
<script src="js/jquery2.0.3.min.js"></script>
<script src="js/modernizr.js"></script>
<script src="js/jquery.cookie.js"></script>
<script src="js/screenfull.js"></script>
        <script>
        $(function () {
            $('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

            if (!screenfull.enabled) {
                return false;
            }

            

            $('#toggle').click(function () {
                screenfull.toggle($('#container')[0]);
            }); 
        });
        </script>
<!-- charts -->
<script src="js/raphael-min.js"></script>
<script src="js/morris.js"></script>
<link rel="stylesheet" href="css/morris.css">
<!-- //charts -->
<!--skycons-icons-->
<script src="js/skycons.js"></script>
<!--//skycons-icons-->
</head>
<body class="dashboard-page">
    <script>
            var theme = $.cookie('protonTheme') || 'default';
            $('body').removeClass (function (index, css) {
                return (css.match (/\btheme-\S+/g) || []).join(' ');
            });
            if (theme !== 'default') $('body').addClass(theme);
        </script>
    <nav class="main-menu">
        <ul>
            <li>
                <a href="#">
                    <i class="fa fa-home nav_icon"></i>
                    <span class="nav-text">
                    Dashboard
                    </span>
                </a>
            </li>
            <li class="has-subnav">
                <a href="/admin">
                <i class="fa fa-file-text-o nav_icon" aria-hidden="true"></i>
                <span class="nav-text">
                    Absen TU
                </span>
                </a>
            </li>
            <li class="has-subnav">
                <a href="/admin/staff">
                <i class="icon-table nav-icon"></i>
                <span class="nav-text">
                    Staff
                </span>
                </a>
            </li>
        </ul>
    </nav>
    <section class="wrapper scrollable">
        <nav class="user-menu">
            <a href="javascript:;" class="main-menu-access">
            <i class="icon-proton-logo"></i>
            <i class="icon-reorder"></i>
            </a>
        </nav>
        <section class="title-bar">
            <div class="logo">
                <h1><a href="#"><img src="images/logo.png" alt="" />ADMIN</a></h1>
            </div>
            <div class="w3l_search">
                <form action="#" method="post">
                    <input type="text" name="search" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}" required="">
                    <button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
            </div>
            <div class="header-right">
                <div class="profile_details_left">
                    <div class="profile_details">       
                        <ul>
                            <li class="dropdown profile_details_drop">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <div class="profile_img">   
                                        <span class="prfil-img"><i class="fa fa-user" aria-hidden="true"></i></span> 
                                        <div class="clearfix"></div>    
                                    </div>  
                                </a>
                                <ul class="dropdown-menu drp-mnu">
                                    <li> <a href="/home"><i class="fa fa-user"></i> Profile</a> </li> 
                                    <li> <a href="/logout"><i class="fa fa-sign-out"></i> Logout</a> </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </section>
        <div class="main-grid">

        <div class="">
            <div class="count-grid">
                <h3 class="title">Profile</h3>
                <br>
                    <b>Name</b>     : <i>{{Auth::user()->name}}</i><br>
                    <b>Email</b>    : <i>{{Auth::user()->email}}</i> <br>
                    <b>Username</b> : <i>{{Auth::user()->username}}</i> <br>
                <br>           
            <div class="clearfix"> </div>
            </div>
        </div>

        </div>
        <!-- footer -->
        <!-- <div class="footer">
            <p>© 2018 RPL2'13 . All Rights Reserved .</p>
        </div> -->
        <!-- //footer -->
    </section>
    <script src="js/bootstrap.js"></script>
    <script src="js/proton.js"></script>
</body>
</html>