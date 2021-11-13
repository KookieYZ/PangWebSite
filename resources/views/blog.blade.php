<link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
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
                <iframe class="embed-responsive-item" width="560" height="315" src="{{asset('assets/video/dota.mp4')}}" title="URL video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div> 
            <div class="col-xl-7 col-md-7 col-12 p-1 mt-3">
                <span>video description: I wanna dance, the music got me going, ain't nothing that can stop how we move yeah</span>
            </div> 
            @endif                         
        @endfor
        </div>      
</section>
@endsection
