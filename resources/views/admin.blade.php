<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
    name="keywords"
    content=""
    />
    <meta
    name="description"
    content=""
    />
    <meta name="robots" content="noindex,nofollow" />
    <title>彭氏公会</title>
    <!-- Favicon icon -->
    <link
    rel="icon"
    type="image/png"
    sizes="16x16"
    href="{{ asset("image/PANG_CLAN_LOGO.png") }}"/>
    <!-- Custom CSS -->
    <link href="../assets/libs/flot/css/float-chart.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div
    id="main-wrapper"
    data-layout="vertical"
    data-navbarbg="skin5"
    data-sidebartype="full"
    data-sidebar-position="absolute"
    data-header-position="absolute"
    data-boxed-layout="full"
    >
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar" data-navbarbg="skin5">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin5">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
            <!-- Logo icon -->
            <b class="logo-icon ps-2">
                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                <!-- Dark Logo icon -->
                <img
                src="{{ asset("image/PANG_CLAN_LOGO.png") }}"
                alt="homepage"
                class="light-logo"
                width="40"
                />
            </b>
            <!--End Logo icon -->
            <!-- Logo text -->
            <span class="logo-text ms-2">
                <!-- dark Logo text -->
                <span style="vertical-align: middle; font-size: 25px">彭氏公会</span>
            </span>
            <!-- Logo icon -->
            <!-- <b class="logo-icon"> -->
            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
            <!-- Dark Logo icon -->
            <!-- <img src="../assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->

            <!-- </b> -->
            <!--End Logo icon -->
            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->
            <a
            class="nav-toggler waves-effect waves-light d-block d-md-none"
            href="javascript:void(0)"
            ><i class="ti-menu ti-close"></i
            ></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div
            class="navbar-collapse collapse"
            id="navbarSupportedContent"
            data-navbarbg="skin5"
        >
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-start me-auto">
            <li class="nav-item d-none d-lg-block">
                <a
                class="nav-link sidebartoggler waves-effect waves-light"
                href="javascript:void(0)"
                data-sidebartype="mini-sidebar"
                ><i class="mdi mdi-menu font-24"></i
                ></a>
            </li>
            <!-- ============================================================== -->
            </ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-end">
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            <li class="nav-item dropdown">
                <a
                class="
                    nav-link
                    dropdown-toggle
                    text-muted
                    waves-effect waves-dark
                    pro-pic
                "
                href="#"
                id="navbarDropdown"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
                >
                <img
                    src="../assets/images/users/1.jpg"
                    alt="user"
                    class="rounded-circle"
                    width="31"
                />
                </a>
                <ul
                class="dropdown-menu dropdown-menu-end user-dd animated"
                aria-labelledby="navbarDropdown"
                >
                <a class="dropdown-item" href="javascript:void(0)"
                    ><i class="mdi mdi-account me-1 ms-1"></i> My Profile</a
                >
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ url('/logout') }}"
                    ><i class="fa fa-power-off me-1 ms-1"></i> Logout</a
                >
                </ul>
            </li>
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            </ul>
        </div>
        </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar" data-sidebarbg="skin5">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
            <li class="sidebar-item">
                <a
                class="sidebar-link waves-effect waves-dark sidebar-link"
                href="{{ route('admin.dashboard') }}"
                aria-expanded="false"
                ><i class="mdi mdi-view-dashboard"></i
                ><span class="hide-menu">Dashboard</span></a
                >
            </li>
            <li class="sidebar-item">
                <a
                class="sidebar-link waves-effect waves-dark sidebar-link"
                href="{{ route('user.index') }}"
                aria-expanded="false"
                ><i class="mdi mdi-account-key"></i
                ><span class="hide-menu">Admin</span></a
                >
            </li>
            <li class="sidebar-item">
                <a
                class="sidebar-link waves-effect waves-dark sidebar-link"
                href="{{ route('relationship.index') }}"
                aria-expanded="false"
                ><i class="mdi mdi-face"></i
                ><span class="hide-menu">Relationship</span></a
                >
            </li>
            <li class="sidebar-item">
                <a
                class="sidebar-link waves-effect waves-dark sidebar-link"
                href="{{ route('page.index') }}"
                aria-expanded="false"
                ><i class="me-2 mdi mdi-book-open-page-variant"></i
                ><span class="hide-menu">Pages</span></a
                >
            </li>
            <li class="sidebar-item">
                <a
                class="sidebar-link waves-effect waves-dark sidebar-link"
                href="{{ route('blog.index') }}"
                aria-expanded="false"
                ><i class="mdi mdi-receipt"></i
                ><span class="hide-menu">Blog</span></a
                >
            </li>
            <li class="sidebar-item">
                <a
                class="sidebar-link waves-effect waves-dark sidebar-link"
                href="{{ route('theme.index') }}"
                aria-expanded="false"
                ><i class="mdi mdi-border-inside"></i
                ><span class="hide-menu">Theme</span></a
                >
            </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Sales Cards  -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-cyan text-center">
                <a href="{{ route('admin.dashboard') }}">
                <h1 class="font-light text-white">
                    <i class="mdi mdi-view-dashboard"></i>
                </h1>
                <h6 class="text-white">Dashboard</h6>
                </a>
                </div>
            </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-warning text-center">
                    <a href="{{ route('user.index') }}">
                <h1 class="font-light text-white">
                    <i class="mdi mdi-account-key"></i>
                </h1>
                <h6 class="text-white">Admin</h6>
                    </a>
                </div>
            </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-4 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-secondary text-center">
                <a href="{{ route('relationship.index') }}">
                <h1 class="font-light text-white">
                    <i class="mdi mdi-border-outside"></i>
                </h1>
                <h6 class="text-white">Relationship</h6>
                </a>
                </div>
            </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-success text-center">
                <a href="{{ route('page.index') }}">
                <h1 class="font-light text-white">
                    <i class="me-2 mdi mdi-book-open-page-variant"></i>
                </h1>
                <h6 class="text-white">Pages</h6>
                </a>
                </div>
            </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-info text-center">
                <a href="{{ route('blog.index') }}">
                <h1 class="font-light text-white">
                    <i class="mdi mdi-arrow-all"></i>
                </h1>
                <h6 class="text-white">Blog</h6>
                </div>
            </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-danger text-center">
                <a href="{{ route('theme.index') }}">
                <h1 class="font-light text-white">
                    <i class="mdi mdi-receipt"></i>
                </h1>
                <h6 class="text-white">Theme</h6>
                </a>
                </div>
            </div>
            </div>
        </div>
        </div>
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center">
        All Rights Reserved.
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="../dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="../assets/libs/flot/excanvas.js"></script>
    <script src="../assets/libs/flot/jquery.flot.js"></script>
    <script src="../assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="../assets/libs/flot/jquery.flot.time.js"></script>
    <script src="../assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="../assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="../assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="../dist/js/pages/chart/chart-page-init.js"></script>
</body>
</html>
