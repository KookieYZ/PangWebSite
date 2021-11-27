@extends('includes.app')

@section('content')
<section class="title">
    <div class="text-center h1 p-auto mt-5"><b><ins>延年公家訓</ins></b></div>
</section>

<section class="content">
    <div class="row">
    @for ($i = 0; $i < 4; $i++)
        @if ($i < 2)
        <div class="w-auto p-2 ml-3 d-flex justify-content-start">
            <image src="{{asset('assets/images/profile.jpg')}}" height="400" width="600">
        </div>        
        @else
        <div class="w-auto p-2 ml-3 d-flex justify-content-start">                
            <iframe class="embed-responsive-item" width="400" height="315" src="{{asset('assets/videos/doremon.mp4')}}" title="URL video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>             
        </div>
        @endif 
        <div class="col-xl-6 col-md-6 col-12 p-1 mt-1 ml-3">
            <div>{{ $i < 2 ?"Photo" :"Video"}} description: <br> This page shares my best articles to read on topics like health, happiness, creativity, productivity and more. The central question that drives my work is, “How can we live better?” To answer that question, I like to write about science-based ways to solve practical problems. You’ll find interesting articles to read on topics like how to stop procrastinating as well as personal recommendations like my list of the best books to read and my minimalist travel guide. Ready to dive in? You can use the categories below to browse my best articles.</div>
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
