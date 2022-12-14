@extends('layouts.share')
@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">添加事迹</h4>
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
                {{-- <form class="form-horizontal"> --}}
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data"
                        action="{{ route('people_history.store') }}">
                        {!! csrf_field() !!}
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="history_name"
                                    class="col-sm-3 text-end control-label col-form-label">事件名称</label>
                                <div class="col-sm-2">
                                    <input type="text"
                                        class="form-control{{ $errors->has('history_name') ? ' is-invalid' : '' }}"
                                        id="history_name" name="history_name" value="{{ old('history_name') }}"
                                        placeholder="在此输出事件名称" required />
                                    @if ($errors->has('history_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('history_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label">事件照片</label>
                                <div class="col-md-9">
                                    <div class="custom-file">
                                        <input type="file"
                                            class="custom-file-input{{ $errors->has('image_path') ? ' is-invalid' : '' }}"
                                            id="image_path" name="image_path" accept="image/*" />
                                        <br />
                                        <img src="{{ asset('image/people_history/noimage.jpg') }}" id="display"
                                            height="130" width="130" style="border:solid">
                                    </div>
                                    @if ($errors->has('image_path'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image_path') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="incident_date"
                                    class="col-sm-3 text-end control-label col-form-label">发生于</label>
                                <div class="col-sm-2">
                                    <input type="date"
                                        class="form-control{{ $errors->has('incident_date') ? ' is-invalid' : '' }}"
                                        id="incident_date" name="incident_date" value="{{ old('incident_date') }}"
                                        placeholder="发生于" max="9999-12-31" />
                                    @if ($errors->has('incident_date'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('incident_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="url" class="col-sm-3 text-end control-label col-form-label">事件内容</label>
                                <div class="col-sm-9">
                                    <textarea type="text"
                                        class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                        id="description" name="description" value="{{ old('description') }}"
                                        placeholder="事件内容" style="max-height:300px" rows="4" cols="50"></textarea>
                                    @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label">事件视频</label>
                                <div class="col-md-9">
                                    <div class="custom-file">
                                        <input type="file"
                                            class="custom-file-input{{ $errors->has('media_path') ? ' is-invalid' : '' }}"
                                            id="media_path" name="media_path" accept="video/mp4,video/x-m4v,video/*" />
                                        <br />
                                        <br />
                                        <video width="400" controls>
                                            <source src="" id="video_here">
                                            Your browser does not support HTML5 video.
                                        </video>
                                    </div>
                                    @if ($errors->has('media_path'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('media_path') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="people_id"
                                    class="col-sm-3 text-end control-label col-form-label">事件人物</label>
                                <div class="col-sm-2">
                                     <input list="incident_person" type="text" name="incident_person" class="form-control" >
                                    <datalist id="incident_person" class="dropdown-menu">
                                        @foreach ($pplNameArr as $ppl)
                                             <option value="{{ $ppl->name }}"></option>
                                        @endforeach
                                    </datalist>

                                    {{-- <select class="form-select" aria-label="" id="people_id" required name="people_id">
                                        <option value="" selected>---未选择---</option>
                                        @foreach ($pplNameArr as $ppl)
                                        <option value="{{ $ppl->id}}" {{($ppl->id == $selectedPerson) ? 'selected' :
                                            ''}}>{{ $ppl->name }}</option>
                                        @endforeach
                                    </select> --}}
                                    @if ($errors->has('people_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('people_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary">
                                    提交
                                </button>
                                <a href="{{ route('people_history.index') }}" class="btn btn-primary" id="back">{{
                                    __('返回') }}</a>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    @endsection

    @section('js')
    <script>
        // Image Preview Usage
image_path.onchange = evt => {
    var ext = $('#image_path').val().split('.').pop().toLowerCase();
     if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
         if(document.getElementById('image_path').files.length != 0){
                $('input#image_path').attr('type','');
                $('input#image_path').attr('type','file');
                $("source").attr('src','{{ URL::asset('/image/people_history/noimage.jpg')}}');
                alert('只有照片是被允许的');
                return; 
         }
     }
  const [file] = image_path.files
  if (file) {
    display.src = URL.createObjectURL(file)
  }
}

// incident_date.onclick = evt => {
//         var today = new Date();
//         var dd = String(today.getDate()).padStart(2, '0');
//         var mm = String(today.getMonth() + 1).padStart(2, '0');
//         var yyyy = today.getFullYear();

//         today = yyyy + '-' + mm + '-' + dd;
//         $('#incident_date').attr('min',today);
// }   


$(document).on("change", "#media_path", function(evt) { // Video Preview
     var ext = $('#media_path').val().split('.').pop().toLowerCase();
     if($.inArray(ext, ['mp4','mpg','mpeg','avi','wmv','mov','rm','ram','swf','flv','ogg','webm']) == -1) {
         if(document.getElementById('media_path').files.length != 0){
                $('input#media_path').attr('type','');
                $('input#media_path').attr('type','file');
                $("source").attr('src','mov_bbb.mp4');
                alert('只有视频是被允许的');
                return; 
         }
     }
  var $source = $('#video_here'); 
  $source[0].src = URL.createObjectURL(this.files[0]);
  $source.parent()[0].load();
});
    </script>
    @endsection