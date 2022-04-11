@extends('includes.app')
<style>
    li {
        cursor: pointer;
    }

    .border-radius {
        border: 2px solid black;
        border-radius: 25px;
    }
</style>
@section('content')
<section class="content" style="margin-top: 52px">
    <div class="row">
        <div class="col-2">
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu"
                        data-accordion="false">
                        @foreach ($currentPersonHistory as $history)
                        <li class="nav-item border-radius" id="{{$history->id}}">
                            <div class="row d-flex align-items-center">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <span class="ml-2 w-75">
                                    {{ $history->onlyIncidentYear }}
                                </span>
                                {{-- <i class="fas fa-angle-right m-auto"></i> --}}
                            </div>

                        </li>
                        @endforeach
                    </ul>
                </nav>
            </div>
        </div>
        <div class="col-10">
            <div>
                <div class="d-flex align-items-center flex-column" id="scroll_container">
                    <div class="h1 mt-5" id="history_name"><b><ins>事迹</ins></b></div>
                    <div class="w-auto d-flex justify-content-start m-2">
                        <p id="numOfHistory">
                            @if ($numOfHistory === 0)
                            此人没有任何事迹
                            @else
                            此人拥有{{$numOfHistory}}个事迹
                            选择一个事迹以查看详情
                            @endif
                        </p>
                    </div>
                </div>
                @foreach($currentPersonHistory as $history)
                <div id="details{{$history->id}}" class="referUsage" style="display:none">
                    <div class="w-auto d-flex justify-content-center m-2">

                        <img src=" {{ asset('image/people_history/' . $history->image_path) }}" height="300" width="800"
                            class="image-blog" style="border:solid">
                    </div>
                    <input type="hidden" id="hiddenHistoryName" value="{{$history->history_name}}">
                    <div class="w-auto d-flex justify-content-center m-2">
                        <iframe class="embed-responsive-item  video-blog" width="800" height="300"
                            src="{{ asset('assets/videos/people_history/' . $history->media_path)}}"
                            title="URL video player" allowfullscreen="" controls="0" autoplay="0" sandbox=""
                            frameborder="0" scrolling="no"></iframe>
                    </div>
                    <div class="d-flex col-xl-8 col-md-8 col-12 p-1 mt-1 ">
                        <div>
                            此事件发生于：{{$history->incident_date}} <br>
                            人物：{{$history->people_id}}<br>
                            {{$history->description}}
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
</section>
@endsection

@section('js')
<script type="text/javascript" src="{{ URL::asset('js/peoplehistory.js') }}"></script>
@endsection