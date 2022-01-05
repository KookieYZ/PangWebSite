@extends('includes.app')

@section('content')
<section class="search-sec pt-5">
    <div class="container">
        <form action="#" method="post" novalidate="novalidate">
            <div class="row d-flex justify-content-center align-items-center p-3">          
                <div class="col-9">
                    <input type="text" class="form-control search-slt border border-dark" style="border-radius: 20px" placeholder="輸入名字">
                </div>                    
                <div class="col-2">
                    <button type="button" class="btn border border-dark text-black bg-white" style="border-radius: 20px">搜索</button>
                </div>
            </div>
        </form>
    </div>
</section>


<section class="title">
    <div class="text-center h1 p-auto mt-2"><b><ins>就业机会</ins></b></div>
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
@endsection
