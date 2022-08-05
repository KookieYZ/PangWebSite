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
                <h4 class="page-title">页面</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <a href="{{ route('page.create') }}"><button type="button" class="btn btn-primary">新建</button></a>
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
                                    <th scope="col"><b>标题</b></th>
                                    <th scope="col"><b>网站</b></th>
                                    <th scope="col"><b>排行</b></th>
                                    <th scope="col"><b>内容</b></th>
                                    <th scope="col"><b>Publish(Yes/No)</b></th>
                                    <th scope="col"><b>Year</b></th>
                                    <th scope="col"><b>控制选项</b></th>
                                </tr>
                            </thead>
                            @foreach ($pages as $page)
                                <tbody class="customtable">
                                    <tr>
                                        <td>{{ $page->title }}</td>
                                        <td><a href="{{ $page->url }}">{{ $page->url }}</a></td>
                                        <td>{{ $page->ranking }}</td>
                                        {{-- <td>{{ $page->parent_id }} - {{ $page->parent->title }}</td> --}}
                                        <td>{!! $page->description !!}</td>
                                        <td>{{ $page->is_publish }}</td>
                                        <td>{{ $page->year }}</td>
                                        <td>
                                            <a href="{{ route('page.edit', $page) }}"><i class="far fa-edit"
                                                    title="更改页面资料"></i></a>
                                            <a href="{{ route('page.show', $page) }}"><i class="fas fa-eye"
                                                    title="查看详细资料"></i></a>

                                            <form method="POST" action="{{ route('page.destroy', $page->id) }}"
                                                accept-charset="UTF-8" style="display:inline;" title="删除页面">
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
            <div class="d-flex justify-content-end">{{ $pages->links() }}</div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $("#zero_config").DataTable();
    </script>
@endsection
