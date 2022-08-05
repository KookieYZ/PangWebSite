@extends('layouts.share')
@section('content')
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
                        <h4 class="page-title">管理员页面</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <a href="{{ route('user.create') }}"><button type="button"
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
                                            <th scope="col"><b>名称</b></th>
                                            <th scope="col"><b>电子邮件</b></th>
                                            <th scope="col"><b>创建时间</b></th>
                                            <th scope="col"><b>控制选项</b></th>
                                        </tr>
                                    </thead>
                                    @foreach ($admins as $admin)
                                        <tbody class="customtable">
                                            <tr>
                                                <td>{{ $admin->name }}</td>
                                                <td>{{ $admin->email }}</td>
                                                <td>{{ $admin->created_at->format('Y-m-d') }}</td>
                                                <td>
                                                    <a href="{{ route('user.edit', $admin) }}"><i
                                                            class="far fa-edit" title="更改管理员资料"></i></a>
                                                    <a href="{{ route('user.show', $admin) }}"><i
                                                            class="fas fa-eye" title="参考管理员资料"></i></a>

                                                    <form method="POST"
                                                        action="{{ route('user.destroy', $admin->id) }}"
                                                        accept-charset="UTF-8" style="display:inline;"
                                                        title="删除管理员">
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
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">{{ $admins->links() }}</div>
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
@endsection
@section('js')
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $("#zero_config").DataTable();
    </script>
@endsection
