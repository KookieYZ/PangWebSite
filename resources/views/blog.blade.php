@extends('includes.app')

@section('content')
<section class="title">
    <div class="text-center h1 p-2 mt-5"><b><ins>延年公家訓</ins></b></div>
</section>

<section class="content">
    <div class="container">
        <div class="row">
        @for ($i = 0; $i < 4; $i++)
            @if ($i < 2)
            <div class="col-xl-5 col-md-5 col-sm-12 p-4 d-flex justify-content-center">
                <image src="{{asset('assets/images/profile.jpg')}}" height="310" width="400">
            </div> 
            <div class="col-xl-7 col-md-7 col-sm-12 p-1 mt-3">
                <span>photo description: Once upon a time</span>
            </div>        
            @else
            <div class="col-xl-5 col-md-5 col-12 p-4 d-flex justify-content-center">
                <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" width="560" height="315" src="{{asset('assets/videos/doremon.mp4')}}" title="URL video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div> 
            <div class="col-xl-7 col-md-7 col-12 p-1 mt-3">
                <span>video description: I wanna dance, the music got me going, ain't nothing that can stop how we move yeah</span>
            </div> 
            @endif                         
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
