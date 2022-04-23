@extends("layouts.share")
<style>
    iframe {
        pointer-events: none;
        /* Disable any user interaction at all */
    }
</style>
@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">事件详细资料</h4>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form class="form-horizontal">
                    {{-- <form class="form-horizontal" method="POST" enctype="multipart/form-data"
                        action="{{ route('user.store') }}"> --}}
                        {!! csrf_field() !!}
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="title" class="col-sm-3 text-end control-label col-form-label">事件名称</label>
                                <div class="col-sm-2">
                                    <input type="text"
                                        class="form-control{{ $errors->has('history_name') ? ' is-invalid' : '' }}"
                                        id="title" name="history_name"
                                        value="{{ old('history_name') ? old('history_name') : $people_history->history_name }}"
                                        placeholder="工作名称" required disabled />
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
                                        <img src=" {{ asset('image/people_history/' . $people_history->image_path) }}"
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
                                <label for="title" class="col-sm-3 text-end control-label col-form-label">发生于</label>
                                <div class="col-sm-2">
                                    <input type="date"
                                        class="form-control{{ $errors->has('incident_date') ? ' is-invalid' : '' }}"
                                        id="incident_date" title="incident_date"
                                        value="{{ old('incident_date') ? old('incident_date') : $people_history->incident_date }}"
                                        placeholder="发生于" required disabled />
                                    @if ($errors->has('incident_date'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('incident_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="title" class="col-sm-3 text-end control-label col-form-label">事件内容</label>
                                <div class="col-sm-9">
                                    <textarea type="text"
                                        class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                        id="description" name="description" required style="max-height:300px" rows="4"
                                        cols="50"
                                        disabled>{{ old('description') ? old('description') : $people_history->description }}</textarea>
                                    @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="video" class="col-sm-3 text-end control-label col-form-label">事件视频</label>
                                <div class="col-sm-9">
                                    <div class="w-auto d-flex justify-content-start m-2">
                                        {{-- <video id="myVideo" width="400" height="300">
                                            <source
                                                src="{{ asset('assets/videos/people_history/' . $people_history->media_path)}}"
                                                type="video/mp4"> --}}
                                            <video class="embed-responsive-item  video-blog" width="400" height="300"
                                                src="{{ asset('assets/videos/people_history/' . $people_history->media_path)}}"
                                                title="URL video player" allowfullscreen="" controls="0" autoplay="0"
                                                sandbox="" frameborder="0" scrolling="no"></video>
                                            {{--
                                        </video> --}}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="people_id"
                                    class="col-sm-3 text-end control-label col-form-label">事件人物</label>
                                <div class="col-sm-2">
                                    <select class="form-select" aria-label="" id="people_id" disabled name="people_id">
                                        @foreach ($pplNameArr as $ppl)
                                        <option value="{{ $ppl->id}}" {{($ppl->id == $people_history->people_id) ?
                                            'selected' : ''}}>{{ $ppl->name }}</option>
                                        @endforeach
                                    </select>
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
                                <button type="submit" class="btn btn-primary" disabled>
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
</div>
@endsection