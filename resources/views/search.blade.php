<link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/4.1.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<section class="search-sec">
    <div class="container">
        <form action="#" method="post" novalidate="novalidate">
            <div class="row d-flex justify-content-center align-items-center p-3">          
                <div class="col-9">
                    <input type="text" class="form-control search-slt border border-dark" style="border-radius: 20px" placeholder="輸入名字">
                </div>                    
                <div class="col-2">
                    <button type="button" class="btn border border-dark text-black bg-white w-100" style="border-radius: 20px">搜索</button>
                </div>
            </div>
        </form>
    </div>
</section>

<section class="content">   
    <div class="container mt-3 mb-3 p-2 d-flex "> 
        <div class="row d-flex justify-content-center">
        @for ($i = 0; $i < 20; $i++)
            <div class="col-md-3 col-sm-6 p-2">
                <div class="card p-3 bg-danger text-white">
                    <div class="image d-flex flex-column justify-content-center align-items-center"> <img src="{{asset('assests/images/profile.jpg')}}" height="100" width="100" /> 
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

