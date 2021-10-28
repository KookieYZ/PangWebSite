<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<section class="search-sec">
    <div class="container">
        <form action="#" method="post" novalidate="novalidate">
            <div class="row d-flex justify-content-center align-items-center p-3">          
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <input type="text" class="form-control search-slt" placeholder="輸入名字">
                </div>                    
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <button type="button" class="btn btn-danger wrn-btn">搜索</button>
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
                    <div class="image d-flex flex-column justify-content-center align-items-center"> <img src="{{asset('assests/images/profile.jpg')}}" height="100" width="100" /> <input type="text" class="form-control mt-3 text-center" id="name" value="彭子平" />
                    <textarea class="form-control mt-3" id="desc" rows="5">性別 : 男 &#13;&#10;州屬 : 吉隆玻 </textarea>
                    </div>
                </div>
            </div>
        @endfor        
        </div>      
    </div>    
</section>

