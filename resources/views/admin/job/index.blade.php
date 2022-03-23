@extends("layouts.share")
@section('content')
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
                <h4 class="page-title">工作</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <a href="{{ route('job.create') }}"><button type="button"
                                    class="btn btn-primary">新建</button></a>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col"><b>控制选项</b>
                                    </th>
                                    <th scope="col"><b>工作名称</b></th>
                                    <!-- <th scope="col"><b>概述</b></th>
                                    <th scope="col"><b>注意事项</b></th>
                                    <th scope="col"><b>照片</b></th>
                                    <th scope="col"><b>种类</b></th> -->
                                    <th scope="col"><b>薪水</b></th>
                                    <!-- <th scope="col"><b>公司背景</b></th> -->
                                    <th scope="col"><b>公司地址</b></th>
                                    <th scope="col"><b>发表于</b></th>
                                    <!-- <th scope="col"><b>状态</b></th> -->
                                </tr>
                            </thead>
                            @foreach ($jobs as $job)
                                <tbody class="customtable">
                                    <tr>
                                        <th>
                                            <a href="{{ route('job.edit', $job) }}"><i class="far fa-edit"
                                                    title="更改工作资料"></i></a>
                                            <a href="{{ route('job.show', $job) }}"><i class="fas fa-eye"
                                                    title="查看详细资料"></i></a>

                                            <form method="POST" action="{{ route('job.destroy', $job->id) }}"
                                                accept-charset="UTF-8" style="display:inline;" title="删除工作">
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
                                        <td>{{ $job->name }}</td>
                                        <!-- <td>{{ $job->description }}</a></td> -->
                                        <!-- <td>{{ $job->note }}</td> -->
                                        <!-- <td><img src="{{$job->image_path}}"></td> -->
                                        <!-- <td>{{ $job->category }}</td> -->
                                        <td>{{ $job->salary }}</td>
                                        <!-- <td>{{ $job->background }}</td> -->
                                        <td>{{ $job->address }}</td>
                                        <td>{{ $job->posted_on }}</td>
                                        <!-- <td>{{ $job->status }}</td>                 -->

                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
              <div class="d-flex justify-content-end">{{ $jobs->links() }}</div>
        </div>
    </div>
    @endsection