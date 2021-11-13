@extends('includes.app')

@section('content')
<style>
    /*Now the CSS Created by R.S*/
    * {margin: 0; padding: 0;}

.tree ul {
    width: 1000px;
    height: auto;
    padding-top: 20px; 
    position: relative;
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}

.tree li {
    text-align: center;
	list-style-type: none;
	position: relative;
	padding: 20px 5px 0 5px;
	
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}

/*We will use ::before and ::after to draw the connectors*/

.tree li::before, .tree li::after{
	content: '';
	position: absolute; 
    top: -1060; 
    right: -40%;
	border-top: 1px solid #ccc;
	width: 50%; 
    height: 76px;
}
.tree li::after{
    top: 0; 
	right: auto; 
    left: 45%;
	border-left: 1px solid #ccc;
}

/*We need to remove left-right connectors from elements without 
any siblings*/
.tree li:only-child::after, .tree li:only-child::before {
	display: none;
}

/*Remove space from the top of single children*/
.tree li:only-child{ padding-top: 0;}

/*Remove left connector from first child and 
right connector from last child*/
.tree li:first-child::before, .tree li:last-child::after{
	border: 0 none;
}
/*Adding back the vertical connector to the last nodes*/
.tree li:last-child::before{
	border-right: 1px solid #ccc;
	border-radius: 0 5px 0 0;
	-webkit-border-radius: 0 5px 0 0;
	-moz-border-radius: 0 5px 0 0;
}
.tree li:first-child::after{
	border-radius: 5px 0 0 0;
	-webkit-border-radius: 5px 0 0 0;
	-moz-border-radius: 5px 0 0 0;
}

/*Time to add downward connectors from parents*/

.tree .greatChild_right_ul,.tree .greatChild_left_ul,.tree .child_ul {
    width: 1000px;
    height: auto;
    padding-top: 20px; 
    position: relative;
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}
.greatChild_right_ul::before{
    
	content: '';
	position: absolute; 
    top: -8; 
    left: 44.5%;
	border-left: 1px solid #ccc;
	width: 0; 
    height: 84px;
}
.greatChild_left_ul::before{
    
	content: '';
	position: absolute; 
    top: -8; 
    left: 1400;
	border-left: 1px solid #ccc;
	width: 0; 
    height: 84px;
}
.child_ul::before{
    
	content: '';
	position: absolute; 
    top: -8; 
    left: 95%;
	border-left: 1px solid #ccc;
	width: 0; 
    height: 29px;
}


@media (min-width: 1652px){
    .col-xl-2 {
        -ms-flex: 0 0 16.666667%;
        flex: 0 0 50.666667% !important;
        max-width: 50.666667% !important;
    }
    .parents{
        margin-left: 700px;
    }
    .child_left{
        margin-left: 200px;
    }
    .child_right{
        margin-left: 1140px;
        margin-top: -1060px;
    }
    .greatChild_left{
        margin-left: 195px;
    }
    .greatChild_right{
        margin-left: 1135px;
    }

}

/*Time for some hover effects*/
/*We will apply the hover effect the the lineage of the element also*/

</style>
    <div class="tree">
        <ul>
            <li>
                <a>
                    <div class="col-xl-2 col-md-12 col-12 p-2 w-100 parents">
                        <div class="card p-3 bg-danger text-white mt-5">
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
                </a>
                <ul  class="child_ul">
                    <li>
                        <a>
                        <div class="col-xl-2 col-md-4 col-6 p-2 child_left">
                            <div class="card p-3 bg-danger text-white mt-5">
                                <div class="image d-flex flex-row justify-content-center align-items-center"> 
                                    <img class="mr-2" src="{{asset('assets/images/profile.jpg')}}" height="100" width="100" /> 
                                    <img class="ml-2" src="{{asset('assets/images/profile.jpg')}}" height="100" width="100" />
                                </div>
                                <div class="image d-flex flex-column justify-content-center align-items-center"> 
                                    <div class="container bg-white text-dark mt-2" style="border-radius: 20px">
                                        <div class="row d-flex justify-content-center p-2">
                                            <div class="mr-5">彭子平</div>
                                            <div class="ml-4">彭子平</div>
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
                        </a>
                        <ul class="greatChild_left_ul">
                            <li>
                                <a>
                                <div class="col-xl-2 col-md-4 col-6 p-2 greatChild_left">
                                    <div class="card p-3 bg-danger text-white mt-5">
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
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a>
                        <div class="col-xl-2 col-md-3 col-6 p-2 child_right">
                            <div class="card p-3 bg-danger text-white mt-5">
                                <div class="image d-flex flex-row justify-content-center align-items-center"> 
                                    <img class="mr-2" src="{{asset('assets/images/profile.jpg')}}" height="100" width="100" /> 
                                    <img class="ml-2" src="{{asset('assets/images/profile.jpg')}}" height="100" width="100" />
                                </div>
                                <div class="image d-flex flex-column justify-content-center align-items-center"> 
                                    <div class="container bg-white text-dark mt-2" style="border-radius: 20px">
                                        <div class="row d-flex justify-content-center p-2">
                                            <div class="mr-5">彭子平</div>
                                            <div class="ml-4">彭子平</div>
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
                        </a>
                        <ul class="greatChild_right_ul">
                            <li>
                                <a>
                                <div class="col-xl-2 col-md-4 col-6 p-2 greatChild_right">
                                    <div class="card p-3 bg-danger text-white mt-5">
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
                                </a>
                            </li>
                        </ul>            
                    </li>        
                </ul>       
            </li>
        </ul>
    </div>
@endsection