@extends('layouts.share')
@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">仪表板</h4>
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
                            <h6 class="text-white">仪表板</h6>
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
                            <h6 class="text-white">管理员</h6>
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
                                <i class="mdi mdi-face"></i>
                            </h1>
                            <h6 class="text-white">人际关系管理</h6>
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
                                <i class="me-2 mdi mdi-calendar-text"></i>
                            </h1>
                            <h6 class="text-white">页面管理</h6>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
                <div class="card card-hover">
                    <div class="box bg-info text-center">
                        <a href="{{ route('job.index') }}">
                            <h1 class="font-light text-white">
                                <i class="me-2 mdi mdi-tie"></i>
                            </h1>
                            <h6 class="text-white">工作管理</h6>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
                <div class="card card-hover">
                    <div class="box bg-secondary text-center">
                        <a href="{{ route('people_history.index') }}">
                            <h1 class="font-light text-white">
                                <i class="mdi mdi-history"></i>
                            </h1>
                            <h6 class="text-white">人物历史管理</h6>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-2 col-xlg-3">
                <div class="card card-hover">
                    <div class="box bg-info text-center">
                        <a href="{{ route('blog.index') }}">
                            <h1 class="font-light text-white">
                                <i class="mdi mdi-receipt"></i>
                            </h1>
                            <h6 class="text-white">彭氏来源管理</h6>
                        </a>
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
                            <h6 class="text-white">主题设置管理</h6>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
