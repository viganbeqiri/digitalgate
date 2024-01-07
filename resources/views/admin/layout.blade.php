<!DOCTYPE html>
<html lang="en" data-topbar-color="dark">

<head>
    <meta charset="utf-8" />
    <title>
        @yield('title')
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('/') }}admin/assets/images/favicon.ico">

    <!-- Theme Config Js -->
    <script src="{{ asset('/') }}admin/assets/js/head.js"></script>

    <!-- Bootstrap css -->
    <link href="{{ asset('/') }}admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"
        id="app-style" />

    <!-- App css -->
    <link href="{{ asset('/') }}admin/assets/css/app.min.css" rel="stylesheet" type="text/css" />

    <!-- Icons css -->
    <link href="{{ asset('/') }}admin/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">


        <!-- ========== Menu ========== -->
        <div class="app-menu">

            <!-- Brand Logo -->
            <div class="logo-box">
                <!-- Brand Logo Light -->
                <a href="index.html" class="logo-light">
                    <img src="{{ asset('/') }}admin/assets/images/logo-light.png" alt="logo" class="logo-lg">
                    <img src="{{ asset('/') }}admin/assets/images/logo-sm.png" alt="small logo" class="logo-sm">
                </a>

                <!-- Brand Logo Dark -->
                <a href="index.html" class="logo-dark">
                    <img src="{{ asset('/') }}admin/assets/images/logo-dark.png" alt="dark logo" class="logo-lg">
                    <img src="{{ asset('/') }}admin/assets/images/logo-sm.png" alt="small logo" class="logo-sm">
                </a>
            </div>

            <!-- menu-left -->
            <div class="scrollbar">

                <!-- User box -->
                <div class="user-box text-center">
                    <img src="{{ asset('/') }}admin/assets/images/users/user-1.jpg" alt="user-img" title="Mat Helme"
                        class="rounded-circle avatar-md">
                    <div class="dropdown">
                        <a href="javascript: void(0);" class="dropdown-toggle h5 mb-1 d-block"
                            data-bs-toggle="dropdown">Geneva Kennedy</a>
                        <div class="dropdown-menu user-pro-dropdown">

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-user me-1"></i>
                                <span>My Account</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-settings me-1"></i>
                                <span>Settings</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-lock me-1"></i>
                                <span>Lock Screen</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-log-out me-1"></i>
                                <span>Logout</span>
                            </a>

                        </div>
                    </div>
                    <p class="text-muted mb-0">Admin Head</p>
                </div>

                <!--- Menu -->
                <ul class="menu">

                    <li class="menu-title">Navigation</li>

                    <li class="menu-item">
                        <a href="apps-calendar.html" class="menu-link">
                            <span class="menu-icon"><i data-feather="airplay"></i></span>
                            <span class="menu-text"> Dashboards </span>
                        </a>
                    </li>
                    <li class="menu-title">Apps</li>

                    <li class="menu-item">
                        <a href="{{ route('admin.categories.index') }}" class="menu-link">
                            <span class="menu-icon"><i data-feather="calendar"></i></span>
                            <span class="menu-text"> Categories </span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('admin.pages.index') }}" class="menu-link">
                            <span class="menu-icon"><i data-feather="message-square"></i></span>
                            <span class="menu-text"> Pages </span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('admin.products.index') }}" class="menu-link">
                            <span class="menu-icon"><i data-feather="message-square"></i></span>
                            <span class="menu-text"> Products </span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('admin.teams.index') }}" class="menu-link">
                            <span class="menu-icon"><i data-feather="message-square"></i></span>
                            <span class="menu-text"> Team </span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('admin.users.index') }}" class="menu-link">
                            <span class="menu-icon"><i data-feather="user"></i></span>
                            <span class="menu-text"> Users </span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('admin.portofolios.index') }}" class="menu-link">
                            <span class="menu-icon"><i data-feather="message-square"></i></span>
                            <span class="menu-text"> Portofolio </span>
                        </a>
                    </li>


                </ul>
                <!--- End Menu -->
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- ========== Left menu End ========== -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">

            <!-- ========== Topbar Start ========== -->
            <div class="navbar-custom">
                <div class="topbar">
                    <div class="topbar-menu d-flex align-items-center gap-1">

                        <!-- Topbar Brand Logo -->
                        <div class="logo-box">
                            <!-- Brand Logo Light -->
                            <a href="index.html" class="logo-light">
                                <img src="{{ asset('/') }}admin/assets/images/logo-light.png" alt="logo"
                                    class="logo-lg">
                                <img src="{{ asset('/') }}admin/assets/images/logo-sm.png" alt="small logo"
                                    class="logo-sm">
                            </a>

                            <!-- Brand Logo Dark -->
                            <a href="index.html" class="logo-dark">
                                <img src="{{ asset('/') }}admin/assets/images/logo-dark.png" alt="dark logo"
                                    class="logo-lg">
                                <img src="{{ asset('/') }}admin/assets/images/logo-sm.png" alt="small logo"
                                    class="logo-sm">
                            </a>
                        </div>

                        <!-- Sidebar Menu Toggle Button -->
                        <button class="button-toggle-menu">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </div>

                    <ul class="topbar-menu d-flex align-items-center">
                        <!-- User Dropdown -->
                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light"
                                data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                aria-expanded="false">
                                <img src="{{ asset('/') }}admin/assets/images/users/user-1.jpg" alt="user-image"
                                    class="rounded-circle">
                                <span class="ms-1 d-none d-md-inline-block">
                                    Geneva <i class="mdi mdi-chevron-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-user"></i>
                                    <span>My Account</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-settings"></i>
                                    <span>Settings</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-lock"></i>
                                    <span>Lock Screen</span>
                                </a>

                                <div class="dropdown-divider"></div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-log-out"></i>
                                    <span>Logout</span>
                                </a>

                            </div>
                        </li>


                    </ul>
                </div>
            </div>
            <!-- ========== Topbar End ========== -->

            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    @yield('breadcrumb')
                                </div>
                                <h4 class="page-title">@yield('title')</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            @yield('content')

                        </div>
                    </div>
                    <!-- end page title -->

                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div>
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> © Ubold - <a href="https://coderthemes.com/"
                                    target="_blank">{{ env('APP_NAME') }}</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-none d-md-flex gap-4 align-item-center justify-content-md-end footer-links">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->


    <!-- Vendor js -->
    <script src="{{ asset('/') }}admin/assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="{{ asset('/') }}admin/assets/js/app.min.js"></script>
    @yield('scripts')
</body>

</html>
