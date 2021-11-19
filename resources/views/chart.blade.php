@extends('includes.app')

@section('content')
<style>
    .google-visualization-orgchart-table{
        /* max-width: 100%; */
        margin-top: 100px;
    }
    .google-visualization-orgchart-linenode {
        width: 10% !important;
    }
    @media (min-width: 1200px){
    .col-xl-2 {
        -ms-flex: 0 0 16.666667%;
        flex: 0 0 16.666667%;
        max-width: 100.666667%;
    }
}
</style>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

       <div id="chart_div" class="mt-5"></div>

                
                        

<script>
google.charts.load('current', {packages:["orgchart"]});
google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Name');
        data.addColumn('string', 'Manager');
        data.addColumn('string', 'ToolTip');

        // For each orgchart box, provide the name, manager, and tooltip to show.
        data.addRows([
          [{'v':'Parents', 'f':'<div class="col-xl-2 col-md-4 col-6 p-2 child_left">'+
                            '<div class="card p-3 bg-danger text-white">'+
                                '<div class="image d-flex flex-row justify-content-center align-items-center">'+ 
                                    '<img class="mr-2" src="{{asset('assets/images/profile.jpg')}}" height="100" width="100" />'+ 
                                    '<img class="ml-2" src="{{asset('assets/images/profile.jpg')}}" height="100" width="100" />'+
                                '</div>'+
                                '<div class="image d-flex flex-column justify-content-center align-items-center">'+ 
                                    '<div class="container bg-white text-dark mt-2" style="border-radius: 20px">'+
                                        '<div class="row d-flex justify-content-center p-2">'+
                                            '<div class="mr-5">彭子平</div>'+
                                            '<div class="ml-4">彭子平</div>'+
                                        '</div>'+
                                    '</div>'+                   
                                '</div>'+
                                '<div class="container bg-white text-dark mt-2">'+
                                    '<div class="row text-justify p-2">'+
                                        '<div><b>性别 :</b> 男</div>'+
                                    '</div>'+
                                    '<div class="row text-justify p-2">'+
                                    '<div><b>州属 :</b> 吉隆坡</div>'+
                                    '</div>'+
                                    '<div class="row text-justify p-2">'+
                                        '<div><b>描述 :</b> 聚集的祈愿将成为新生的闪耀之星，化作光芒闪耀的道路吧！同调召唤，飞翔吧，星尘龙！</div>'+
                                    '</div>'+
                                    '<div class="row text-justify p-2">'+
                                        '<div><b>描述2 :</b> 集（つど）いし愿（ねが）いが新（あら）たに辉（かがや）く星（ほし）となる。光（ひかり）差（さ）す道（みち）となれ！シンクロ召唤（しょうかん）！飞翔（ひしょう）せよ、スターダスト！</div>'+
                                    '</div>'+          
                                '</div>'+
                            '</div>'+
                        '</div>'},'', 'The President'],
          [{'v':'Childleft', 'f':'<div class="col-xl-2 col-md-4 col-6 p-2 child_left">'+
                            '<div class="card p-3 bg-danger text-white">'+
                                '<div class="image d-flex flex-row justify-content-center align-items-center">'+ 
                                    '<img class="mr-2" src="{{asset('assets/images/profile.jpg')}}" height="100" width="100" />'+ 
                                    '<img class="ml-2" src="{{asset('assets/images/profile.jpg')}}" height="100" width="100" />'+
                                '</div>'+
                                '<div class="image d-flex flex-column justify-content-center align-items-center">'+ 
                                    '<div class="container bg-white text-dark mt-2" style="border-radius: 20px">'+
                                        '<div class="row d-flex justify-content-center p-2">'+
                                            '<div class="mr-5">彭子平</div>'+
                                            '<div class="ml-4">彭子平</div>'+
                                        '</div>'+
                                    '</div>'+                   
                                '</div>'+
                                '<div class="container bg-white text-dark mt-2">'+
                                    '<div class="row text-justify p-2">'+
                                        '<div><b>性别 :</b> 男</div>'+
                                    '</div>'+
                                    '<div class="row text-justify p-2">'+
                                    '<div><b>州属 :</b> 吉隆坡</div>'+
                                    '</div>'+
                                    '<div class="row text-justify p-2">'+
                                        '<div><b>描述 :</b> 聚集的祈愿将成为新生的闪耀之星，化作光芒闪耀的道路吧！同调召唤，飞翔吧，星尘龙！</div>'+
                                    '</div>'+
                                    '<div class="row text-justify p-2">'+
                                        '<div><b>描述2 :</b> 集（つど）いし愿（ねが）いが新（あら）たに辉（かがや）く星（ほし）となる。光（ひかり）差（さ）す道（みち）となれ！シンクロ召唤（しょうかん）！飞翔（ひしょう）せよ、スターダスト！</div>'+
                                    '</div>'+          
                                '</div>'+
                            '</div>'+
                        '</div>'},
           'Parents', 'VP'],
          [{'v':'Childright', 'f':'<div class="col-xl-2 col-md-4 col-6 p-2 child_left">'+
                            '<div class="card p-3 bg-danger text-white">'+
                                '<div class="image d-flex flex-row justify-content-center align-items-center">'+ 
                                    '<img class="mr-2" src="{{asset('assets/images/profile.jpg')}}" height="100" width="100" />'+ 
                                    '<img class="ml-2" src="{{asset('assets/images/profile.jpg')}}" height="100" width="100" />'+
                                '</div>'+
                                '<div class="image d-flex flex-column justify-content-center align-items-center">'+ 
                                    '<div class="container bg-white text-dark mt-2" style="border-radius: 20px">'+
                                        '<div class="row d-flex justify-content-center p-2">'+
                                            '<div class="mr-5">彭子平</div>'+
                                            '<div class="ml-4">彭子平</div>'+
                                        '</div>'+
                                    '</div>'+                   
                                '</div>'+
                                '<div class="container bg-white text-dark mt-2">'+
                                    '<div class="row text-justify p-2">'+
                                        '<div><b>性别 :</b> 男</div>'+
                                    '</div>'+
                                    '<div class="row text-justify p-2">'+
                                    '<div><b>州属 :</b> 吉隆坡</div>'+
                                    '</div>'+
                                    '<div class="row text-justify p-2">'+
                                        '<div><b>描述 :</b> 聚集的祈愿将成为新生的闪耀之星，化作光芒闪耀的道路吧！同调召唤，飞翔吧，星尘龙！</div>'+
                                    '</div>'+
                                    '<div class="row text-justify p-2">'+
                                        '<div><b>描述2 :</b> 集（つど）いし愿（ねが）いが新（あら）たに辉（かがや）く星（ほし）となる。光（ひかり）差（さ）す道（みち）となれ！シンクロ召唤（しょうかん）！飞翔（ひしょう）せよ、スターダスト！</div>'+
                                    '</div>'+          
                                '</div>'+
                            '</div>'+
                        '</div>'}, 'Parents', ''],
          [{'v':'GrandChild1', 'f':'<div class="col-xl-2 col-md-4 col-6 p-2 child_left">'+
                            '<div class="card p-3 bg-danger text-white">'+
                                '<div class="image d-flex flex-row justify-content-center align-items-center">'+ 
                                    '<img class="mr-2" src="{{asset('assets/images/profile.jpg')}}" height="100" width="100" />'+ 
                                    '<img class="ml-2" src="{{asset('assets/images/profile.jpg')}}" height="100" width="100" />'+
                                '</div>'+
                                '<div class="image d-flex flex-column justify-content-center align-items-center">'+ 
                                    '<div class="container bg-white text-dark mt-2" style="border-radius: 20px">'+
                                        '<div class="row d-flex justify-content-center p-2">'+
                                            '<div class="mr-5">彭子平</div>'+
                                            '<div class="ml-4">彭子平</div>'+
                                        '</div>'+
                                    '</div>'+                   
                                '</div>'+
                                '<div class="container bg-white text-dark mt-2">'+
                                    '<div class="row text-justify p-2">'+
                                        '<div><b>性别 :</b> 男</div>'+
                                    '</div>'+
                                    '<div class="row text-justify p-2">'+
                                    '<div><b>州属 :</b> 吉隆坡</div>'+
                                    '</div>'+
                                    '<div class="row text-justify p-2">'+
                                        '<div><b>描述 :</b> 聚集的祈愿将成为新生的闪耀之星，化作光芒闪耀的道路吧！同调召唤，飞翔吧，星尘龙！</div>'+
                                    '</div>'+
                                    '<div class="row text-justify p-2">'+
                                        '<div><b>描述2 :</b> 集（つど）いし愿（ねが）いが新（あら）たに辉（かがや）く星（ほし）となる。光（ひかり）差（さ）す道（みち）となれ！シンクロ召唤（しょうかん）！飞翔（ひしょう）せよ、スターダスト！</div>'+
                                    '</div>'+          
                                '</div>'+
                            '</div>'+
                        '</div>'}, 'Childright', ''],
          [{'v':'GrandChild', 'f':'<div class="col-xl-2 col-md-4 col-6 p-2 child_left">'+
                            '<div class="card p-3 bg-danger text-white">'+
                                '<div class="image d-flex flex-row justify-content-center align-items-center">'+ 
                                    '<img class="mr-2" src="{{asset('assets/images/profile.jpg')}}" height="100" width="100" />'+ 
                                    '<img class="ml-2" src="{{asset('assets/images/profile.jpg')}}" height="100" width="100" />'+
                                '</div>'+
                                '<div class="image d-flex flex-column justify-content-center align-items-center">'+ 
                                    '<div class="container bg-white text-dark mt-2" style="border-radius: 20px">'+
                                        '<div class="row d-flex justify-content-center p-2">'+
                                            '<div class="mr-5">彭子平</div>'+
                                            '<div class="ml-4">彭子平</div>'+
                                        '</div>'+
                                    '</div>'+                   
                                '</div>'+
                                '<div class="container bg-white text-dark mt-2">'+
                                    '<div class="row text-justify p-2">'+
                                        '<div><b>性别 :</b> 男</div>'+
                                    '</div>'+
                                    '<div class="row text-justify p-2">'+
                                    '<div><b>州属 :</b> 吉隆坡</div>'+
                                    '</div>'+
                                    '<div class="row text-justify p-2">'+
                                        '<div><b>描述 :</b> 聚集的祈愿将成为新生的闪耀之星，化作光芒闪耀的道路吧！同调召唤，飞翔吧，星尘龙！</div>'+
                                    '</div>'+
                                    '<div class="row text-justify p-2">'+
                                        '<div><b>描述2 :</b> 集（つど）いし愿（ねが）いが新（あら）たに辉（かがや）く星（ほし）となる。光（ひかり）差（さ）す道（みち）となれ！シンクロ召唤（しょうかん）！飞翔（ひしょう）せよ、スターダスト！</div>'+
                                    '</div>'+          
                                '</div>'+
                            '</div>'+
                        '</div>'}, 'Childright', '']
        ]);

        // Create the chart.
        var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
        // Draw the chart, setting the allowHtml option to true for the tooltips.
        chart.draw(data, {'allowHtml':true, 'allowCollapse':true, 'size':'medium'});
        
      }
</script>
                        
@endsection