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
                            <label for="name" class="col-sm-3 text-end control-label col-form-label">名称</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                    id="name" name="name" value="{{ old('name') }}" placeholder="名称" required />
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
                                        id="avatar" name="avatar" onchange="previewImage(event,0);" accept="image/*" />
                                    <br />
                                    <br />
                                    <img src="{{ asset('image/avatar/noimage.jpg') }}" id="display0" height="130"
                                        width="130" style="border:solid">
                                </div>
                                @if ($errors->has('avatar'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('avatar') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="spouse_name" class="col-sm-3 text-end control-label col-form-label">配偶名称</label>
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
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 text-end control-label col-form-label">配偶头像</label>
                            <div class="col-md-9">
                                <div class="custom-file">
                                    <input type="file"
                                        class="custom-file-input{{ $errors->has('spouse_avatar') ? ' is-invalid' : '' }}"
                                        id="spouse_avatar1" name="spouse_avatar[]" onchange="previewImage(event,1);"
                                        accept="image/*" />
                                    <br />
                                    <br />
                                    <img src="{{ asset('image/avatar/noimage.jpg') }}" id="display1" height="130"
                                        width="130" style="border:solid">
                                    <br />
                                </div>
                                @if ($errors->has('spouse_avatar'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('spouse_avatar') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        {{-- for extra spouse usage --}}
                        <input type='hidden' id="numofSpouse" name="numofSpouse" value='2'>
                        <input type='hidden' id="storeSpouseImgSrc" name="storeSpouseImgSrc">
                        <div id="addMoreSpouseName" class="form-group row">
                        </div>
                        <div id="addMoreSpouseAvatar" class="form-group row">

                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label hidden"></label>
                                <div class="col-md-9">
                                    <a href="" id="addmorespouse" name="addmorespouse" class="link-primary"
                                        title="添加更多配偶">{{ __('添加更多配偶') }}</a>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gender" class="col-sm-3 text-end control-label col-form-label">性别</label>
                                <div class="col-sm-9">
                                    <select class="form-select" aria-label="" id="gender" name="gender" required>
                                        <option value="1">男</option>
                                        <option value="2">女</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="state" class="col-sm-3 text-end control-label col-form-label">州属</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" id="state"
                                        name="state" value="{{ old('state') }}" placeholder="州属" required />
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
                                        id="nationality" name="nationality" value="马来西亚" placeholder="国籍" required />
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
                                        id="dob_date" name="dob_date" value="{{ old('dob_date') }}" placeholder="出生日期"
                                        required />
                                    @if ($errors->has('dob_date'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('dob_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="parent_id" class="col-sm-3 text-end control-label col-form-label">父母</label>
                                <div class="col-sm-9">
                                    <select class="form-select" aria-label="" id="parent_id" name="parent_id">
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
                                <label for="era" class="col-sm-3 text-end control-label col-form-label">年代</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control{{ $errors->has('era') ? ' is-invalid' : '' }}" id="era"
                                        name="era" value="{{ old('era') }}" placeholder="年代" required />
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
                            <button type="submit" id="btnSubmit" class="btn btn-primary">
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
        var spouseImgArr = [];
        $(document).ready(function() {
var counter = 2;
$("#btnSubmit").on("click", function() {
    //Pass back to controller
        var imgSrcArr = $('input[id*="spouse_avatar"]');
        for (var i = 0; i < imgSrcArr.length; i++) { 
            if(imgSrcArr[i].files[0]==null){ 
                spouseImgArr.push("noimage.jpg"); 
            }
            else{
            spouseImgArr.push(imgSrcArr[i].files[0].name); } 
        } 
            $('#storeSpouseImgSrc').val(spouseImgArr);

});

$("#addmorespouse").on("click", function(e) {
e.preventDefault();
$('#addMoreSpouseName').append("<label for='spouse_name'class='col-sm-3 text-end control-label col-form-label'>配偶名称"+counter+"</label><div class='col-sm-9'> <input name='spouse_name[]' type='text' class='form-control' id='spouse_name' placeholder='配偶名称'></div><br /><br /><label class='col-sm-3 text-end control-label col-form-label'>配偶头像"+counter+"</label><div class='col-md-9'><div class='custom-file'> <input type='file' class='custom-file-input' id='spouse_avatar"+counter+"' name='spouse_avatar[]' onchange='previewImage(event,"+counter+")' accept='image/*''/><br /><br /><img id='display"+counter+"' height='130'width='130' style='border:solid;' src='{{URL::asset('image/avatar/noimage.jpg') }}' />");
counter = counter +1;
$('#numofSpouse').val(counter);   
});  
});   
        // Image Preview Usage
        function previewImage(event,key) {
        var control = 'display'+ key;
        var ext = $(event.target).val().split('.').pop().toLowerCase();
        if (event.target.files.length > 0 && $.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1 ) {
        $(event.target).attr('type','');
        $(event.target).attr('type','file');
        $('#'+control).attr('src', "{{ URL::asset('/image/avatar/noimage.jpg')}}");
        alert('只有照片是被允许的');
        return;
        }
        var src = URL.createObjectURL(event.target.files[0]);
        var preview = document.getElementById(control);
        preview.src = src;
        preview.style.display = "block";

    
    }
    </script>

    @endsection