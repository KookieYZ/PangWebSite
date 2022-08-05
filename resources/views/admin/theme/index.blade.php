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
                <h4 class="page-title">主题设置</h4>
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
                                    <th scope="col"><b>主要设置</b></th>
                                    <th scope="col"><b>设置内容</b></th>
                                    <th scope="col"><b>控制选项</b></th>
                                </tr>
                            </thead>
                            @foreach ($themes as $theme)
                                <tbody class="customtable">
                                    <tr>
                                        <td>{{ $theme->key }}</td>
                                        <td>
                                            @if ($theme->id == 4)
                                            <img src=" {{ asset($theme->value) }}" height="100" width="300"
                                            style="border:solid">
                                            @elseif ($theme->id == 5)
                                            <img src=" {{ asset($theme->value) }}" height="100" width="100"
                                            style="border:solid">
                                            @else
                                            {{ $theme->value }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('theme.edit', $theme) }}"><i class="far fa-edit"
                                                    title="更改资料"></i></a>
                                            <a href="{{ route('theme.show', $theme) }}"><i class="fas fa-eye"
                                                    title="查看资料"></i></a>
                                            <form>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end"></div>
            {{-- <div class="d-flex justify-content-end">{{ $admins->links() }}</div> --}}
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
