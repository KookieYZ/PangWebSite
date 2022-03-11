@extends('layouts.share')
    @section('content')
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">新建人际关系资料</h4>
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
                            <form class="form-horizontal" method="POST" enctype="multipart/form-data"
                                action="{{ route('relationship.store') }}">
                                @csrf
                                {{-- {!! csrf_field() !!} --}}
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="name"
                                            class="col-sm-3 text-end control-label col-form-label">名称</label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                id="name" name="name" value="{{ old('name') }}" placeholder="名称"
                                                required />
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-end control-label col-form-label">头像</label>
                                        <div class="col-md-9">
                                            <div class="custom-file">
                                                <input type="file"
                                                    class="custom-file-input{{ $errors->has('avatar') ? ' is-invalid' : '' }}"
                                                    id="avatar" name="avatar" onchange="show(this)" />
                                                <br />
                                                <br />
                                                <img src="{{ asset('image/avatar/noimage.jpg') }}" id="display"
                                                    height="130" width="130" style="border:solid">
                                            </div>
                                            @if ($errors->has('avatar'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('avatar') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="spouse_name"
                                            class="col-sm-3 text-end control-label col-form-label">配偶名称</label>
                                        <div class="col-sm-9" id="dynamicAddRemove">
                                            <input type="text"
                                                class="form-control{{ $errors->has('spouse_name') ? ' is-invalid' : '' }}"
                                                id="spouse_name" name="spouse_name[]" placeholder="配偶名称"
                                                value="{{ old('spouse_name') }}" />
                                            @if ($errors->has('spouse_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('spouse_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <td><button type="button" name="add" id="dynamic-ar" class="btn btn-primary">Add Spouse</button></td>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-end control-label col-form-label">配偶头像</label>
                                        <div class="col-md-9">
                                            <div class="custom-file">
                                                <input type="file"
                                                    class="custom-file-input{{ $errors->has('spouse_avatar') ? ' is-invalid' : '' }}"
                                                    id="spouse_avatar" name="spouse_avatar[]" onchange="spouse(this)" />
                                                    {{-- <br/>
                                                    <br/>
                                                    <img src="{{ asset('image/avatar/noimage.jpg') }}" id="spouse_display" height="130" width="130" style="border:solid">
                                                    <br />
                                                    <a href="" id="addmorespouse" name="addmorespouse" class="link-primary" title="添加更多配偶">{{ __('添加更多配偶') }}</a> --}}
                                            </div>
                                            @if ($errors->has('spouse_avatar'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('spouse_avatar') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div id="displayaddmorespouse" class="form-group row">
                                    </div>
                                    <div id="displayaddmorespouse_avatar" class="form-group row">
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 text-end control-label col-form-label hidden"></label>
                                        <div class="col-md-9">
                                            <img src="{{ asset('image/avatar/noimage.jpg') }}"
                                            id="spouse_display" height="130" width="130" style="border:solid">
                                            <br/>
                                            <a href="" id="addmorespouse" name="addmorespouse" class="link-primary" title="添加更多配偶">{{ __('添加更多配偶') }}</a>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="gender"
                                            class="col-sm-3 text-end control-label col-form-label">性别</label>
                                        <div class="col-sm-9">
                                            <select class="form-select" aria-label="" id="gender" name="gender"
                                                required>
                                                <option value="1">男</option>
                                                <option value="2">女</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="state"
                                            class="col-sm-3 text-end control-label col-form-label">州属</label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}"
                                                id="state" name="state" value="{{ old('state') }}"
                                                placeholder="州属" required />
                                            @if ($errors->has('state'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('state') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nationality"
                                            class="col-sm-3 text-end control-label col-form-label">国籍</label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="form-control{{ $errors->has('nationality') ? ' is-invalid' : '' }}"
                                                id="nationality" name="nationality" value="马来西亚"
                                                placeholder="国籍" required />
                                            @if ($errors->has('nationality'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('nationality') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="dob_date"
                                            class="col-sm-3 text-end control-label col-form-label">出生日期</label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="form-control date-inputmask{{ $errors->has('dob_date') ? ' is-invalid' : '' }}"
                                                id="dob_date" name="dob_date" value="{{ old('dob_date') }}"
                                                placeholder="出生日期" required />
                                            @if ($errors->has('dob_date'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('dob_date') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="parent_id"
                                            class="col-sm-3 text-end control-label col-form-label">父母</label>
                                        <div class="col-sm-9">
                                            <select class="form-select" aria-label="" id="parent_id"
                                                name="parent_id">
                                                <option value="" selected>---未选择---</option>
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
                                    <div class="form-group row">
                                        <label for="era"
                                            class="col-sm-3 text-end control-label col-form-label">年代</label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="form-control{{ $errors->has('era') ? ' is-invalid' : '' }}"
                                                id="era" name="era" value="{{ old('era') }}" placeholder="年代"
                                                required />
                                            @if ($errors->has('era'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('era') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary">
                                    提交
                                </button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
   @endsection
    
@section('js')
    <script>
        function show(input) {
            debugger;
            var validExtensions = ['jpg', 'png', 'jpeg', 'PNG', 'JPG', 'JPEG']; //array of valid extensions
            var fileName = input.files[0].name;
            var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
            var maxSize = 3145728;
            if ($.inArray(fileNameExt, validExtensions) == -1) {
                input.type = ''
                input.type = 'file'
                $('#avatar').attr('src', "");
                // https://st3.depositphotos.com/23594922/31822/v/600/depositphotos_318221368-stock-illustration-missing-picture-page-for-website.jpg
                $('#display').attr('src', '{{ URL::asset('/image/avatar/noimage.jpg') }}');
                alert("Only these file types are accepted : " + validExtensions.join(', '));
            } else {
                if (input.files && input.files[0] && input.files.size < maxSize || input.files[0].size < maxSize) {
                    var filerdr = new FileReader();
                    filerdr.onload = function(e) {
                        $('#display').attr('src', e.target.result);
                    }
                    filerdr.readAsDataURL(input.files[0]);
                } else {
                    input.type = ''
                    input.type = 'file'
                    $('#avatar').attr('src', "");
                    $('#display').attr('src', '{{ URL::asset('/image/avatar/noimage.jpg') }}');
                    alert("Maximum file size is 3MB.");
                }
            }
        }

        function spouse(input) {
            debugger;
            var validExtensions = ['jpg', 'png', 'jpeg', 'PNG', 'JPG', 'JPEG']; //array of valid extensions
            var fileName = input.files[0].name;
            var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
            var maxSize = 3145728; //kb -> mb [3mb]
            if ($.inArray(fileNameExt, validExtensions) == -1) {
                input.type = ''
                input.type = 'file'
                $('#spouse_avatar').attr('src', "");
                // https://st3.depositphotos.com/23594922/31822/v/600/depositphotos_318221368-stock-illustration-missing-picture-page-for-website.jpg
                $('#spouse_display').attr('src', '{{ URL::asset('/image/avatar/noimage.jpg') }}');
                alert("Only these file types are accepted : " + validExtensions.join(', '));
            } else {
                if (input.files && input.files[0] && input.files.size < maxSize || input.files[0].size < maxSize) {
                    var filerdr = new FileReader();
                    filerdr.onload = function(e) {
                        $('#spouse_display').attr('src', e.target.result);
                    }
                    filerdr.readAsDataURL(input.files[0]);
                } else {
                    input.type = ''
                    input.type = 'file'
                    $('#spouse_avatar').attr('src', "");
                    $('#spouse_display').attr('src', '{{ URL::asset('/image/avatar/noimage.jpg') }}');
                    alert("Maximum file size is 3MB.");
                }
            }
        }
        $(document).ready(function() {
            var counter = 1;
            $("#addmorespouse").on("click", function(e) {
                e.preventDefault();
                console.log("addmorespouse clicked");
                counter = counter + 1;
                console.log(counter);
                if (counter >= 6) {
                    console.log('cannot click more than 5');
                    alert('配偶不能添加超过5个');
                    return ($(this).attr('disabled')) ? false : true;
                }
                $('#displayaddmorespouse').append("<label for='spouse_name' class='col-sm-3 text-end control-label col-form-label'>配偶名称"+counter+"</label> <div class='col-sm-9'> <input name='spouse_name[]' type='text' class='form-control' id='spouse_name' placeholder='配偶名称'></div><br/><br/><label class='col-sm-3 text-end control-label col-form-label'>配偶头像"+counter+"</label> <div class='col-md-9'> <div class='custom-file'> <input type='file' class='custom-file-input' id='spouse_avatar' name='spouse_avatar[]' onchange='spouse(this)'/>");
            });
        });
    </script>

    @endsection
