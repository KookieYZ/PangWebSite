<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template" />
    <meta name="description"
        content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework" />
    <meta name="robots" content="noindex,nofollow" />
    <title>彭氏公会</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('image/PANG_CLAN_LOGO.png') }}" />

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/extra-libs/multicheck/multicheck.css') }}" />
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet" />
    <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet" />
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
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
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
                            <img src="{{ asset('image/PANG_CLAN_LOGO.png') }}" alt="homepage" class="light-logo"
                                width="40" />
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
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-start me-auto">
                        <li class="nav-item d-none d-lg-block">
                            <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)"
                                data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-end">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="
                    nav-link
                    dropdown-toggle
                    text-muted
                    waves-effect waves-dark
                    pro-pic
                  "
                                href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <img src="{{ asset('assets/images/users/1.jpg') }}" alt="user" class="rounded-circle"
                                    width="31" />
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end user-dd animated"
                                aria-labelledby="navbarDropdown">
                                {{-- <a class="dropdown-item" href="javascript:void(0)"><i
                                        class="mdi mdi-account me-1 ms-1"></i> My Profile</a> --}}
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ url('/logout') }}"><i
                                        class="fa fa-power-off me-1 ms-1"></i> 登出</a>
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
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{ route('admin.dashboard') }}" aria-expanded="false"><i
                                    class="mdi mdi-view-dashboard"></i><span class="hide-menu">仪表板</span></a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{ route('user.index') }}" aria-expanded="false"><i
                                    class="mdi mdi-account-key"></i><span class="hide-menu">管理员</span></a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{ route('relationship.index') }}" aria-expanded="false"><i
                                    class="mdi mdi-face"></i><span class="hide-menu">人际关系管理</span></a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{ route('page.index') }}" aria-expanded="false"><i
                                    class="me-2 mdi mdi-calendar-text"></i><span class="hide-menu">页面管理</span></a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{ route('blog.index') }}" aria-expanded="false"><i
                                    class="mdi mdi-receipt"></i><span class="hide-menu">彭氏来源管理</span></a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{ route('theme.index') }}" aria-expanded="false"><i
                                    class="mdi mdi-border-inside"></i><span class="hide-menu">主题设置管理</span></a>
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
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-success">
                        {{ session()->get('error') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">页面</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <a href="{{ route('page.create') }}"><button type="button"
                                            class="btn btn-primary">新建</button></a>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col"><b>控制选项</b>
                                            </th>
                                            <th scope="col"><b>标题</b></th>
                                            <th scope="col"><b>网站</b></th>
                                            <th scope="col"><b>排行</b></th>
                                            <th scope="col"><b>内容</b></th>
                                            <th scope="col"><b>Publish(Yes/No)</b></th>
                                            <th scope="col"><b>Year</b></th>

                                        </tr>
                                    </thead>
                                    @foreach ($pages as $page)
                                        <tbody class="customtable">
                                            <tr>
                                                <th>
                                                    <a href="{{ route('page.edit', $page) }}"><i
                                                            class="far fa-edit" title="更改页面资料"></i></a>
                                                    <a href="{{ route('page.show', $page) }}"><i
                                                            class="fas fa-eye" title="查看详细资料"></i></a>

                                                    <form method="POST"
                                                        action="{{ route('page.destroy', $page->id) }}"
                                                        accept-charset="UTF-8" style="display:inline;"
                                                        title="删除页面">
                                                        {{ csrf_field() }}
                                                        @method('DELETE')
                                                        <button type="submit" style="background-color: transparent;
                            background-repeat: no-repeat;
                            border: none;
                            cursor: pointer;
                            overflow: hidden;
                            outline: none;">
                                                            <i class="me-2 mdi mdi-delete"></i>
                                                        </button>
                                                    </form>
                                                </th>
                                                <td>{{ $page->title }}</td>
                                                <td><a href="{{ $page->url }}">{{ $page->url }}</a></td>
                                                <td>{{ $page->ranking }}</td>
                                                {{-- <td>{{ $page->parent_id }} - {{ $page->parent->title }}</td> --}}
                                                <td>{!! $page->description !!}</td>
                                                <td>{{ $page->is_publish }}</td>
                                                <td>{{ $page->year }}</td>
                                
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">{{ $pages->links() }}</div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
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
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('dist/js/custom.min.js') }}"></script>
    <!-- this page js -->
    <script src="{{ asset('assets/extra-libs/multicheck/datatable-checkbox-init.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/multicheck/jquery.multicheck.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/DataTables/datatables.min.js') }}"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $("#zero_config").DataTable(); 
    </script>
</body>

</html>
