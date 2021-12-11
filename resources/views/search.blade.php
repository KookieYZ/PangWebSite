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

    <section class="content">   
        <div class="container mt-3 mb-3 p-2 d-flex"> 
            <div class="row d-flex justify-content-start">
            @for ($i = 0; $i < 20; $i++)
                <div class="col-xl-2 col-md-3 col-6 p-2">
                    <a href="{{ route('site.chart') }}">
                        <div class="card p-3 bg-danger text-white">
                            <div class="image d-flex flex-column justify-content-center align-items-center"> <img src="{{asset('assets/images/profile.jpg')}}" height="100" width="100" /> 
                                <div class="container bg-white text-dark mt-2" style="border-radius: 20px">
                                    <div class="row d-flex justify-content-center p-2">
                                        <div>彭子平</div>
                                    </div>
                                </div>                    
                            </div>
                            <div class="container bg-white text-dark mt-2">
                                <div class="row text-justify p-2">
                                    <div><b>性别 :</b> 男</div>
                                </div>
                                <div class="row text-justify p-2">
                                <div><b>州属 :</b> 吉隆坡</div>
                                </div>
                                <div class="row text-justify p-2">
                                    <div><b>描述 :</b> 聚集的祈愿将成为新生的闪耀之星，化作光芒闪耀的道路吧！同调召唤，飞翔吧，星尘龙！</div>
                                </div>
                                <div class="row text-justify p-2">
                                    <div><b>描述2 :</b> I wanna dance, the music's got me going Ain't nothing that can stop how we move, yeah Let's break our plans and live just like we're golden And roll in like we're dancing fools We don't need to worry 'Cause when we fall, we know how to land Don't need to talk the talk, just walk the walk tonight 'Cause we don't need permission to dance</div>
                                </div>            
                            </div>
                        </div>
                    </a>
                </div>
            @endfor        
            </div>      
        </div>    
    </section>

<style>
    a:hover {
    text-decoration: none;
    }
</style>
@endsection