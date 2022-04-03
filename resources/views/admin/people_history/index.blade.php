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
            <h4 class="page-title">人物历史</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <a href="{{ route('people_history.create') }}"><button type="button"
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
                                <th scope="col"><b>事件名称</b></th>
                                <th scope="col"><b>事件人物</b></th>
                                <th scope="col"><b>发生于</b></th>

                            </tr>
                        </thead>
                        @foreach ($people_history as $history)
                        <tbody class="customtable">
                            <tr>
                                <th>
                                    <a href="{{ route('people_history.edit', $history) }}"><i class="far fa-edit"
                                            title="更改历史事件"></i></a>
                                    <a href="{{ route('people_history.show', $history) }}"><i class="fas fa-eye"
                                            title="查看详细资料"></i></a>

                                    <form method="POST" action="{{ route('people_history.destroy', $history->id) }}"
                                        accept-charset="UTF-8" style="display:inline;" title="删除历史事件">
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
                                <td>{{ $history->history_name }}</td>
                                <td>{{ $history->people_id}}</td>
                                <td>{{ $history->incident_date }}</td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end">{{ $people_history->links() }}</div>
    </div>
</div>
@endsection