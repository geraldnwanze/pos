<!DOCTYPE html>
<html lang="en" class="loading">
  
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>{{ strtoupper(auth()->user()->role) }} Dashboard - {{ config('app.name') }}</title>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link href="{{ asset('fonts.googleapis.com/css0491.css?family=Rubik:300,400,500,700,900%7CMontserrat:300,400,500,600,700,800,900') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/fonts/feather/style.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/fonts/simple-line-icons/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/fonts/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/perfect-scrollbar.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/prism.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/chartist.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('toastr.min.css') }}">
    <style>
      th{
        text-transform: capitalize;
      }
      td{
        text-transform: capitalize;
      }
    </style>
  </head>
  <body data-col="2-columns" class=" 2-columns ">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">

        <x-alert />
      <div data-active-color="white" data-background-color="black" data-image="{{ asset('app-assets/img/sidebar-bg/01.jpg') }}" class="app-sidebar">
        <div class="sidebar-header">
          <div class="logo clearfix"><a href="index-2.html" class="logo-text float-left">
              <div class="logo-img"><img src="{{ asset('app-assets/img/logo.png') }}" alt="Logo"/></div><span class="text align-middle">{{ config('app.name') }}</span></a><a id="sidebarToggle" href="javascript:;" class="nav-toggle d-none d-sm-none d-md-none d-lg-block"><i data-toggle="expanded" class="ft-disc toggle-icon"></i></a><a id="sidebarClose" href="javascript:;" class="nav-close d-block d-md-block d-lg-none d-xl-none"><i class="ft-circle"></i></a></div>
        </div>
        <div class="sidebar-content">
          <div class="nav-container">
            <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
              <li class="nav-item">
                <a href="{{ route('dashboard.'.auth()->user()->role.'.index') }}">
                  <i class="icon-home"></i>
                  <span data-i18n="" class="menu-title">Dashboard</span>
                </a>
              </li>
              <li class="nav-item"><a href="#"><i class="ft-shopping-cart"></i><span data-i18n="" class="menu-title">Make a sale</span></a>
              </li>
              <li class="nav-item"><a href="{{ route('dashboard.products.index') }}"><i class="icon-screen-desktop"></i><span data-i18n="" class="menu-title">Products</span></a>
              </li>
              <li class="nav-item"><a href="#"><i class="fa fa-book"></i><span data-i18n="" class="menu-title">Sales Record</span></a>
                
              </li>
              <li class="nav-item"><a href="{{ route('dashboard.profile') }}"><i class="icon-user"></i><span data-i18n="" class="menu-title">Profile</span></a>
              </li>
              <li class="nav-item"><a href="{{ route('dashboard.settings') }}"><i class="ft-settings"></i><span data-i18n="" class="menu-title">Settings</span></a>
              </li>
              <li class="nav-item"><a href="{{ route('dashboard.users.index') }}"><i class="ft-users"></i><span data-i18n="" class="menu-title">Users</span></a>
              </li>
              <li class=" nav-item"><a href="#" onclick="$('#logout').submit()"><i class="icon-logout"></i><span data-i18n="" class="menu-title">Logout</span></a>
              </li>
            </ul>
          </div>
        </div>
        <div class="sidebar-background"></div>
      </div>


      <nav class="navbar navbar-expand-lg navbar-light bg-faded">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" data-toggle="collapse" class="navbar-toggle d-lg-none float-left">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <span class="d-lg-none navbar-right navbar-collapse-toggle">
              <a class="open-navbar-container">
                <i class="ft-more-vertical"></i>
              </a>
            </span>
            <a id="navbar-fullscreen" href="javascript:;" class="mr-2 display-inline-block apptogglefullscreen">
              <i class="ft-maximize blue-grey darken-4 toggleClass"></i>
              <p class="d-none">fullscreen</p></a>
          </div>
          <div class="navbar-container">
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
              <ul class="navbar-nav">
                <li class="dropdown nav-item mr-0">
                  <a id="dropdownBasic3" href="#" data-toggle="dropdown" class="nav-link position-relative dropdown-user-link dropdown-toggle">
                    <span class="avatar avatar-online">
                    <img id="navbar-avatar" src="{{ asset('app-assets/img/portrait/small/avatar-s-3.jpg') }}" alt="avatar"/></span>
                    <p class="d-none">User Settings</p></a>
                  <div aria-labelledby="dropdownBasic3" class="dropdown-menu dropdown-menu-right">
                    <div class="arrow_box_right">
                      <a href="user-profile-page.html" class="dropdown-item py-1">
                        <i class="ft-edit mr-2"></i>
                        <span>My Profile</span>
                      </a>
                      <a href="javascript:;" class="dropdown-item py-1">
                        <i class="ft-settings mr-2"></i>
                        <span>Settings</span>
                      </a>
                      <div class="dropdown-divider"></div><a href="#" onclick="$('#logout').submit()" class="dropdown-item"><i class="ft-power mr-2"></i><span>Logout</span></a>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>

      <div class="main-panel">
        <div class="main-content">
          <div class="content-wrapper">
            <div class="container-fluid">

              @yield('content')

            </div>
          </div>
        </div>

        <footer class="footer footer-static footer-light">
          <p class="clearfix text-muted text-center px-2"><span>Copyright  &copy; {{ date('Y') }} <a href="#" id="pixinventLink" target="_blank" class="text-bold-800 primary darken-2">{{ config('app.name') }} </a>, All rights reserved. </span></p>
        </footer>

      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <form action="{{ route('dashboard.logout') }}" method="post" id="logout">
      @csrf
    </form>
    <!-- BEGIN VENDOR JS-->
    <script src="{{ asset('app-assets/vendors/js/core/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/prism.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/jquery.matchHeight-min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/screenfull.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pace/pace.min.js') }}"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{ asset('app-assets/vendors/js/chartist.min.js') }}"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN CONVEX JS-->
    <script src="{{ asset('app-assets/js/app-sidebar.js') }}"></script>
    <script src="{{ asset('app-assets/js/notification-sidebar.js') }}"></script>
    <script src="{{ asset('app-assets/js/customizer.js') }}"></script>
    <!-- END CONVEX JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{ asset('app-assets/js/dashboard-analytics.js') }}"></script>
    <!-- END PAGE LEVEL JS-->
    <script src="{{ asset('toastr.min.js') }}"></script>
  </body>

</html>