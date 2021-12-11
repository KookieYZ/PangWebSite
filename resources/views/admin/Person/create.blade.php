<!DOCTYPE html>
<html dir="ltr" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta
        name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template"
        />
        <meta
        name="description"
        content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework"
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
        <link
        rel="stylesheet"
        type="text/css"
        href="{{ asset("assets/extra-libs/multicheck/multicheck.css") }}"
        />
        <link
        href="{{ asset("assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css") }}"
        rel="stylesheet"
        />
        <link href="{{ asset("dist/css/style.min.css") }}" rel="stylesheet" />
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
                    src="{{ asset("assets/images/users/1.jpg") }}"
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
            <h4 class="page-title">Create New Relationship</h4>
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
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
            <div class="card">
                <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('relationship.store') }}">
                    @csrf
                    {{-- {!! csrf_field() !!} --}}
                <div class="card-body">
                    <div class="form-group row">
                    <label
                        for="name"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Name</label
                    >
                    <div class="col-sm-9">
                        <input
                        type="text"
                        class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                        id="name" name="name" value="{{ old('name') }}"
                        placeholder="Name" required
                        />
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-end control-label col-form-label">Avatar</label>
                        <div class="col-md-9">
                        <div class="custom-file">
                            <input
                            type="file"
                            class="custom-file-input{{ $errors->has('avatar') ? ' is-invalid' : '' }}"
                            id="avatar" name="avatar" onchange="show(this)"
                            />
                            <br />
                            <br />
                            <img src="{{ asset('image/avatar/noimage.jpg') }}" id="display" height="130" width="130"
                            style="border:solid">
                        </div>
                        @if ($errors->has('avatar'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('avatar') }}</strong>
                            </span>
                        @endif
                        </div>
                    </div>
                    <div class="form-group row">
                    <label
                        for="spouse_name"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Spouse Name</label
                    >
                    <div class="col-sm-9">
                        <input
                        type="text"
                        class="form-control{{ $errors->has('spouse_name') ? ' is-invalid' : '' }}"
                        id="spouse_name" name="spouse_name"
                        placeholder="Spouse Name" value="{{ old('spouse_name') }}"
                        />
                        @if ($errors->has('spouse_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('spouse_name') }}</strong>
                        </span>
                        @endif
                    </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-end control-label col-form-label">Spouse Avatar</label>
                        <div class="col-md-9">
                        <div class="custom-file">
                            <input
                            type="file"
                            class="custom-file-input{{ $errors->has('spouse_avatar') ? ' is-invalid' : '' }}"
                            id="spouse_avatar" name="spouse_avatar" onchange="spouse(this)"
                            />
                            <br />
                            <br />
                            <img src="{{ asset('image/avatar/noimage.jpg') }}" id="spouse_display" height="130" width="130"
                            style="border:solid">
                        </div>
                        @if ($errors->has('spouse_avatar'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('spouse_avatar') }}</strong>
                        </span>
                        @endif
                        </div>
                    </div>
                    <div class="form-group row">
                    <label
                        for="gender"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Gender</label
                    >
                    <div class="col-sm-9">
                        <select class="form-select" aria-label="" id="gender" name="gender" required>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                        </select>
                    </div>
                    </div>
                    <div class="form-group row">
                    <label
                        for="state"
                        class="col-sm-3 text-end control-label col-form-label"
                        >State</label
                    >
                    <div class="col-sm-9">
                        <input
                        type="text"
                        class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}"
                        id="state" name="state" value="{{ old('state') }}"
                        placeholder="State" required
                        />
                        @if ($errors->has('state'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('state') }}</strong>
                        </span>
                        @endif
                    </div>
                    </div>
                    <div class="form-group row">
                        <label
                        for="nationality"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Nationality</label
                        >
                        <div class="col-sm-9">
                        <input
                            type="text"
                            class="form-control{{ $errors->has('nationality') ? ' is-invalid' : '' }}"
                            id="nationality" name="nationality" value="{{ old('nationality') }}"
                            placeholder="Nationality" required
                        />
                        @if ($errors->has('nationality'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('nationality') }}</strong>
                        </span>
                        @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                        for="dob_date"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Date of Birth</label
                        >
                        <div class="col-sm-9">
                        <input
                        type="text"
                        class="form-control date-inputmask{{ $errors->has('dob_date') ? ' is-invalid' : '' }}"
                        id="dob_date" name="dob_date" value="{{ old('dob_date') }}"
                        placeholder="Enter Date of Birth" required
                        />
                        @if ($errors->has('dob_date'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('dob_date') }}</strong>
                        </span>
                        @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                        for="parent_id"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Parent</label
                        >
                        <div class="col-sm-9">
                            <select class="form-select" aria-label="" id="parent_id" name="parent_id">
                                <option value="" selected>---Seleted---</option>
                                @foreach ($persons as $person)
                                    <option value="{{ $person->id }}">{{ $person->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if ($errors->has('parent_id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('parent_id') }}</strong>
                        </span>
                        @endif
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                    </div>
                </div>
                </form>
            </div>
            </div>
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
    <script src="{{ asset("assets/libs/jquery/dist/jquery.min.js") }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset("assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js") }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset("assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js") }}"></script>
    <script src="{{ asset("assets/extra-libs/sparkline/sparkline.js") }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset("dist/js/waves.js") }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset("dist/js/sidebarmenu.js") }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset("dist/js/custom.min.js") }}"></script>
    <script src="{{ asset("assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js") }}"></script>
    <script src="{{ asset("dist/js/pages/mask/mask.init.js") }}"></script>

    <script>
        function show(input) {
            debugger;
            var validExtensions = ['jpg','png','jpeg', 'PNG', 'JPG', 'JPEG']; //array of valid extensions
            var fileName = input.files[0].name;
            var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
            var maxSize = 3145728;
            if ($.inArray(fileNameExt, validExtensions) == -1) {
                input.type = ''
                input.type = 'file'
                $('#avatar').attr('src',"");
                // https://st3.depositphotos.com/23594922/31822/v/600/depositphotos_318221368-stock-illustration-missing-picture-page-for-website.jpg
                $('#display').attr('src', '{{ URL::asset('/image/avatar/noimage.jpg') }}');
                alert("Only these file types are accepted : "+validExtensions.join(', '));
            }
            else
            {
                if (input.files && input.files[0] && input.files.size < maxSize || input.files[0].size < maxSize) {
                    var filerdr = new FileReader();
                    filerdr.onload = function (e) {
                        $('#display').attr('src', e.target.result);
                    }
                    filerdr.readAsDataURL(input.files[0]);
                }
                else {
                    input.type = ''
                    input.type = 'file'
                    $('#avatar').attr('src',"");
                    $('#display').attr('src', '{{ URL::asset('/image/avatar/noimage.jpg') }}');
                    alert("Maximum file size is 3MB.");
                }
            }
        }

        function spouse(input) {
            debugger;
            var validExtensions = ['jpg','png','jpeg', 'PNG', 'JPG', 'JPEG']; //array of valid extensions
            var fileName = input.files[0].name;
            var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
            var maxSize = 3145728; //kb -> mb [3mb]
            if ($.inArray(fileNameExt, validExtensions) == -1) {
                input.type = ''
                input.type = 'file'
                $('#spouse_avatar').attr('src',"");
                // https://st3.depositphotos.com/23594922/31822/v/600/depositphotos_318221368-stock-illustration-missing-picture-page-for-website.jpg
                $('#spouse_display').attr('src', '{{ URL::asset('/image/avatar/noimage.jpg') }}');
                alert("Only these file types are accepted : "+validExtensions.join(', '));
            }
            else
            {
                if (input.files && input.files[0] && input.files.size < maxSize || input.files[0].size < maxSize) {
                    var filerdr = new FileReader();
                    filerdr.onload = function (e) {
                        $('#spouse_display').attr('src', e.target.result);
                    }
                    filerdr.readAsDataURL(input.files[0]);
                }
                else {
                    input.type = ''
                    input.type = 'file'
                    $('#spouse_avatar').attr('src',"");
                    $('#spouse_display').attr('src', '{{ URL::asset('/image/avatar/noimage.jpg') }}');
                    alert("Maximum file size is 3MB.");
                }
            }
        }
    </script>
</body>
</html>
