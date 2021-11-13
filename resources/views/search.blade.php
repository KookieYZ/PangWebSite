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
                                <div><b>描述2 :</b> 集（つど）いし愿（ねが）いが新（あら）たに辉（かがや）く星（ほし）となる。光（ひかり）差（さ）す道（みち）となれ！シンクロ召唤（しょうかん）！飞翔（ひしょう）せよ、スターダスト！</div>
                            </div>            
                        </div>
                    </div>
                </div>
            @endfor        
            </div>      
        </div>    
    </section>
    
    <div class="container">
        <div class="scroller scroller-left">
            <i class="fa fa-chevron-left"></i>
        </div>
        <div class="scroller scroller-right">
            <i class="fa fa-chevron-right"></i>
        </div>
        <div class="wrapper">
            <ul class="nav nav-tabs list" id="myTab">
                @for($year = 1971; $year <= 2021; $year++)
                    <!-- <li class="active"><a href="#home">Home</a></li> -->
                    <li><a href="#{{ $year }}">{{ $year }}</a></li>
                @endfor
            </ul>
        </div>
    </div>

    <style>
        .wrapper {
            position:relative;
            margin:0 auto;
            overflow:hidden;
            padding:5px;
            height:50px;
        }

        .list {
            position:absolute;
            left:0px;
            top:0px;
            min-width:3000px;
            margin-left:12px;
            margin-top:0px;
        }

        .list li{
            display:table-cell;
            position:relative;
            text-align:center;
            cursor:grab;
            cursor:-webkit-grab;
            color:#efefef;
            vertical-align:middle;
        }

        .scroller {
            text-align:center;
            cursor:pointer;
            display:none;
            padding:7px;
            padding-top:11px;
            white-space:no-wrap;
            vertical-align:middle;
            background-color:#fff;
        }

        .scroller-right{
            float:right;
        }

        .scroller-left {
            float:left;
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    
    <script>
        var hidWidth;
        var scrollBarWidths = 40;

        var widthOfList = function(){
            var itemsWidth = 100;
            $('.list li').each(function(){
                var itemWidth = $(this).outerWidth();
                itemsWidth+=itemWidth;
            });
            return itemsWidth;
        };

        var widthOfHidden = function(){
            return (($('.wrapper').outerWidth())-widthOfList()-getLeftPosi())-scrollBarWidths;
        };

        var getLeftPosi = function(){
            return $('.list').position().left;
        };

        var reAdjust = function(){
            if (($('.wrapper').outerWidth()) < widthOfList()) {
                $('.scroller-right').show();
            }
            else {
                $('.scroller-right').hide();
            }
            
            if (getLeftPosi()<40) {
                $('.scroller-left').show();
            }
            else {
                $('.item').animate({left:"-="+getLeftPosi()+"px"},'slow');
                $('.scroller-left').hide();
            }
        }

        reAdjust();

        $(window).on('resize',function(e){  
            reAdjust();
        });

        $('.scroller-right').click(function() {
            $('.scroller-left').fadeIn('slow');
            $('.scroller-right').fadeOut('slow');
            
            $('.list').animate({left:"+="+widthOfHidden()+"px"},'slow',function(){

            });
        });

        $('.scroller-left').click(function() {
            $('.scroller-right').fadeIn('slow');
            $('.scroller-left').fadeOut('slow');
        
            $('.list').animate({left:"-="+getLeftPosi()+"px"},'slow',function(){
            
            });
        });    
    </script>
@endsection