    <nav class="main-menu">
        <ul>
            <li>
                <a href="/admin">
                    <i class="fa fa-home nav_icon"></i>
                    <span class="nav-text">
                    Dashboard
                    </span>
                </a>
            </li>
            <li class="has-subnav">
                <a href="/admin/daftar-kehadiran">
                <i class="fa fa-file-text-o nav_icon" aria-hidden="true"></i>
                <span class="nav-text">
                    Daftar Kehadiran
                </span>
                </a>
            </li>
            <li class="has-subnav">
                <a href="/admin/daftar-staff">
                <i class="icon-table nav-icon"></i>
                <span class="nav-text">
                    Daftar Staff
                </span>
                </a>
            </li>
            <li class="has-subnav">
                <a href="/admin/manage-admin">
                <i class="fa fa-user nav-icon"></i>
                <span class="nav-text">
                    Manage Admin
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
                <h1><a href="#">Absen TU</a> <h3 id="txt" style="padding-left: 15px;"></h3></h1>
            </div>

           
            <div class="header-right">
                <div class="profile_details_left">
                    <div class="profile_details">       
                        <ul>
                            <li class="dropdown profile_details_drop">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <div class="profile_img">   
                                        <span class="prfil-img">{{Auth::user()->name}} &nbsp<i class="fa fa-user" aria-hidden="true"></i></span> 
                                        <div class="clearfix"></div>    
                                    </div>  
                                </a>
                                <ul class="dropdown-menu drp-mnu">
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