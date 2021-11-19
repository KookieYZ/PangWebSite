<footer id="contact">
    <div class="container-fluid px-0" style="background-color:#FF0000">
        <div class="row m-0">
            <div class="col-md-6 col-md-offset-2 col-sm-offset-2 col-xl-4 col-12">
                <form action="{{ route('site.search') }}" method="get" novalidate="novalidate">
                    <div class="row d-flex align-items-center p-2 m-0">      
                        <div class="col-8 col-md-7 col-xs-4 col-sm mr-auto">
                            <input type="text" class="form-control search-slt border border-dark" style="border-radius: 20px" placeholder="輸入名字">
                        </div>                    
                        <div class="col-4 col-md-4 col-xs-4 col-sm mr-auto">
                            <button type="submit" class="btn border border-dark text-black bg-white w-100" style="border-radius: 20px">搜索</button>
                        </div>
                    </div>
                </form>
                <div class="col-sm-8 col-xs-8">
                    <h3 class="text-white text-left"><u>联系我们</u></h3>
                </div>
                <div class="col-sm-12 col-xs-12 col-md-12 text-left p-0">
                    <img class="img-fluid" src="{{asset('assets/images/Instagram.png')}}">
                    <a class="text-white" href="">get@bootstrap.com</a>
                </div>
                <div class="col-sm-12 col-xs-12 text-left p-0">
                    <img class="img-fluid" src="{{asset('assets/images/Facebook.png')}}">
                    <a class="text-white" href="">get@bootstrap.com</a>
                </div>
                <div class="col-sm-12 col-xs-12 text-left p-0">
                    <img class="img-fluid" src="{{asset('assets/images/Message.png')}}">
                    <a class="text-white" href="">get@bootstrap.com</a>
                </div>
                <div class="col-sm-12 col-xs-12 text-left p-0">
                    <img class="img-fluid" src="{{asset('assets/images/Whatapps.png')}}">
                    <a class="text-white"href="">get@bootstrap.com</a>
                </div>
            </div>
        </div>
    </div>
</footer>