@extends('includes.app')

@section('content')
<section class="title">
    <div><br/></div>
    <div class="text-center h1 p-auto mt-5"><b><ins>彭姓来源</ins></b></div>
</section>

<section class="content">
    <div class="row" style="margin-right: 0px !important; margin-left: 0px !important;">
    @for ($i = 0; $i < 4; $i++)
        @if ($i < 2)
        <div class="w-auto d-flex justify-content-start m-2">
            <image src="{{asset('assets/images/profile.jpg')}}" height="300" width="400">
        </div>        
        @else
        <div class="w-auto d-flex justify-content-start m-2">                
            <iframe class="embed-responsive-item" width="400" height="315" src="{{asset('assets/videos/video.mp4')}}" title="URL video player" allowfullscreen="" controls="0" autoplay="0" sandbox="" frameborder="0" scrolling="no"></iframe>             
        </div>
        @endif 
        <div class="col-xl-8 col-md-8 col-12 p-1 mt-1 ">
            <div>{{ $i < 2 ?"照片" :"视频"}} 解说: <br> 此页面能分享最好的文章，以阅读有关健康、幸福、创造力、生产力等主题的文章。推动我工作的核心问题是：“我们怎样才能生活得更好？”为了回答这个问题，我喜欢写一些基于科学的方法来解决实际问题。您会发现有趣的文章可以阅读，主题包括如何停止拖延以及个人建议，例如我的最佳阅读书籍清单和我的极简旅行指南。准备好潜水了吗？您可以使用下面的类别来浏览我最好的文章。</div>
        </div>                         
    @endfor
    </div>      
</section>

<div class="section position-relative">
    <div class="arrow arrow-left">
        <img src="{{asset('assets/images/arrow-left.png')}}" />
    </div>
    <div class="arrow arrow-right">
        <img src="{{asset('assets/images/arrow-right.png')}}" />
    </div>
    <div class="wrapper">
        <div class="scrollmenu">
            @for($year = 1971; $year <= 2021; $year++)
                <a href="#{{ $year }}">{{ $year }}</a>
            @endfor
        </div>
    </div>
</div>

<style>
    .scrollmenu {
        background-color: #f77;
        overflow: auto;
        white-space: nowrap;
    }

    .scrollmenu a {
        display: inline-block;
        color: white;
        text-align: center;
        padding: 7px 21px;
        width: 80;
        text-decoration: none;
    }

    .scrollmenu a:hover {
        background-color: #f00;
        border-radius: 15px 15px 0px 0px
    }

    .arrow {
        position: absolute;
        height: 38px;
        text-align: center;
        padding: 7px;
    }

    .arrow-right {
        right: 0;
    }
</style>

<script>
    $(".arrow-left").hide();

    $(".scrollmenu").scroll(function() {
        if ($(".scrollmenu").scrollLeft() == 0) {
            $(".arrow-left").hide();
        } else {
            $(".arrow-left").show();
        }

        if (($(".scrollmenu").scrollLeft() + $(window).width()) == $(".scrollmenu").get(0).scrollWidth) {
            $(".arrow-right").hide();
        } else {
            $(".arrow-right").show();
        }
    });

    $(".arrow-left").click(function() {
        $(".scrollmenu").scrollLeft( $(".scrollmenu").scrollLeft() - 84);
    });

    $(".arrow-right").click(function() {
        $(".scrollmenu").scrollLeft( $(".scrollmenu").scrollLeft() + 84);
    });
</script>
@endsection
