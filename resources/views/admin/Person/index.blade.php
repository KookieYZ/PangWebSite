@extends('layouts.share')

@section('content')
            <div class="page-breadcrumb">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">人际关系</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <a href="{{ route('relationship.create') }}"><button type="button"
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
                                            <th scope="col"><b>名称</b></th>
                                            <th scope="col"><b>配偶名称</b></th>
                                            {{-- <th scope="col"><b>性别</b></th> --}}
                                            <th scope="col"><b>州属</b></th>
                                            <th scope="col"><b>国籍</b></th>
                                            {{-- <th scope="col"><b>出生日期</b></th> --}}
                                            <th scope="col"><b>父母</b></th>
                                            <th scope="col"><b>年代</b></th>
                                        </tr>
                                    </thead>
                                    @foreach ($persons as $person)
                                        <tbody class="customtable">
                                            <tr>
                                                <th>
                                                    <a href="{{ route('relationship.edit', $person) }}"><i
                                                            class="far fa-edit" title="更改资料"></i></a>
                                                    <a href="{{ route('relationship.show', $person) }}"><i
                                                            class="fas fa-eye" title="查看详细资料"></i></a>
                                                    <form method="POST"
                                                        action="{{ route('relationship.destroy', $person->id) }}"
                                                        accept-charset="UTF-8" style="display:inline;"
                                                        title="删除资料">
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
                                                <td>{{ $person->name }}</td>
                                                <td>
                                                    @if ($person->spouse_name != null)
                                                        {{ $person->spouse_name }}
                                                    @else
                                                        No spouse found
                                                    @endif
                                                </td>
                                                {{-- @if ($person->gender == 1)
                                                    <td>男</td>
                                                @else
                                                    <td>女</td>
                                                @endif --}}
                                                <td>{{ $person->state }}</td>
                                                <td>{{ $person->nationality }}</td>
                                                {{-- <td>{{ $person->dob_date }}</td> --}}
                                                @if ($person->parent_id != null)
                                                    <td>{{ $person->parent_id }} - {{ $person->parent->name }}</td>
                                                @else
                                                    <td>No parents found</td>
                                                @endif
                                                <td>{{ $person->era }}</td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">{{ $persons->links() }}</div>
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
   @endsection  
    
      @section('js')
      <script>
      $("#zero_config").DataTable();
      </script>    
        @endsection
</body>

</html>
