@extends('includes.app')

@section('content')
<style>
    body{
        overflow: visible;
    }
    .google-visualization-orgchart-node {
        border: 2px solid #FF0000 !important;
    }   
    .google-visualization-orgchart-table {
        width: 100%;
    }
    .container-fluid{
        max-width: 200%;
        min-width: 150%;
    }
</style>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div class="container-fluid p-2">
    <div id="chart_div" class="mt-5"></div>
</div>

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
          [{'v':'Parents', 'f':'<div class="image d-flex flex-row justify-content-center align-items-center">'+ 
                                    '<img class="mr-2" src="{{asset('assets/images/profile.jpg')}}" height="100" width="100" />'+
                                    '<img class="mr-2" src="{{asset('assets/images/profile.jpg')}}" height="100" width="100" />'+
                                    '<img class="mr-2" src="{{asset('assets/images/profile.jpg')}}" height="100" width="100" />'+
                                    '<img class="mr-2" src="{{asset('assets/images/profile.jpg')}}" height="100" width="100" />'+ 
                                '</div>'+
                                '<div class="image d-flex flex-column justify-content-center align-items-center">'+ 
                                    '<div class="container bg-white text-dark mt-2" style="border-radius: 20px">'+
                                        '<div class="row d-flex justify-content-center p-2">'+
                                            '<div class="mr-5">彭子平 （第一代）</div>'+
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
                                        '<div><b>年份 :</b> 1972-2072</div>'+
                                    '</div>'+          
                                '</div>'},'', 'The President'],
          [{'v':'Childleft', 'f':'<div class="image d-flex flex-row justify-content-center align-items-center">'+ 
                                    '<img class="mr-2" src="{{asset('assets/images/profile.jpg')}}" height="100" width="100" />'+ 
                                    '<img class="mr-2" src="{{asset('assets/images/profile.jpg')}}" height="100" width="100" />'+
                                    '<img class="mr-2" src="{{asset('assets/images/profile.jpg')}}" height="100" width="100" />'+
                                    '<img class="mr-2" src="{{asset('assets/images/profile.jpg')}}" height="100" width="100" />'+
                                    '<img class="mr-2" src="{{asset('assets/images/profile.jpg')}}" height="100" width="100" />'+ 
                                '</div>'+
                                '<div class="image d-flex flex-column justify-content-center align-items-center">'+ 
                                    '<div class="container bg-white text-dark mt-2" style="border-radius: 20px">'+
                                        '<div class="row d-flex justify-content-center p-2">'+
                                            '<div class="mr-5">彭子平 （第一代）</div>'+
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
                                        '<div><b>年份 :</b> 1972-2072</div>'+
                                    '</div>'+          
                                '</div>'},
           'Parents', ''],
           [{'v':'GrandChild', 'f':'<div class="image d-flex flex-row justify-content-center align-items-center">'+ 
                                    '<img class="mr-2" src="{{asset('assets/images/profile.jpg')}}" height="100" width="100" />'+ 
                                    '<img class="mr-2" src="{{asset('assets/images/profile.jpg')}}" height="100" width="100" />'+
                                    '<img class="mr-2" src="{{asset('assets/images/profile.jpg')}}" height="100" width="100" />'+
                                    '<img class="mr-2" src="{{asset('assets/images/profile.jpg')}}" height="100" width="100" />'+
                                    '<img class="mr-2" src="{{asset('assets/images/profile.jpg')}}" height="100" width="100" />'+ 
                                '</div>'+
                                '<div class="image d-flex flex-column justify-content-center align-items-center">'+ 
                                    '<div class="container bg-white text-dark mt-2" style="border-radius: 20px">'+
                                        '<div class="row d-flex justify-content-center p-2">'+
                                            '<div class="mr-5">彭子平 （第一代）</div>'+
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
                                        '<div><b>年份 :</b> 1972-2072</div>'+
                                    '</div>'+          
                                '</div>'},
           'Childleft', ''],
           [{'v':'SuperChild', 'f':'<div class="image d-flex flex-row justify-content-center align-items-center">'+ 
                                    '<img class="mr-2" src="{{asset('assets/images/profile.jpg')}}" height="100" width="100" />'+ 
                                    '<img class="mr-2" src="{{asset('assets/images/profile.jpg')}}" height="100" width="100" />'+
                                    '<img class="mr-2" src="{{asset('assets/images/profile.jpg')}}" height="100" width="100" />'+
                                    '<img class="mr-2" src="{{asset('assets/images/profile.jpg')}}" height="100" width="100" />'+
                                    '<img class="mr-2" src="{{asset('assets/images/profile.jpg')}}" height="100" width="100" />'+ 
                                '</div>'+
                                '<div class="image d-flex flex-column justify-content-center align-items-center">'+ 
                                    '<div class="container bg-white text-dark mt-2" style="border-radius: 20px">'+
                                        '<div class="row d-flex justify-content-center p-2">'+
                                            '<div class="mr-5">彭子平 （第一代）</div>'+
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
                                        '<div><b>年份 :</b> 1972-2072</div>'+
                                    '</div>'+          
                                '</div>'},
           'GrandChild', 'VP'],
          [{'v':'Childright', 'f':'<div class="image d-flex flex-row justify-content-center align-items-center">'+ 
                                    '<img class="mr-2" src="{{asset('assets/images/profile.jpg')}}" height="100" width="100" />'+ 
                                '</div>'+
                                '<div class="image d-flex flex-column justify-content-center align-items-center">'+ 
                                    '<div class="container bg-white text-dark mt-2" style="border-radius: 20px">'+
                                        '<div class="row d-flex justify-content-center p-2">'+
                                            '<div class="mr-5">彭子平 （第一代）</div>'+
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
                                        '<div><b>年份 :</b> 1972-2072</div>'+
                                    '</div>'+          
                                '</div>'}, 'Parents', ''],
          [{'v':'GrandChild1', 'f':'<div class="image d-flex flex-row justify-content-center align-items-center">'+ 
                                    '<img class="mr-2" src="{{asset('assets/images/profile.jpg')}}" height="100" width="100" />'+ 
                                '</div>'+
                                '<div class="image d-flex flex-column justify-content-center align-items-center">'+ 
                                    '<div class="container bg-white text-dark mt-2" style="border-radius: 20px">'+
                                        '<div class="row d-flex justify-content-center p-2">'+
                                            '<div class="mr-5">彭子平 （第一代）</div>'+
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
                                        '<div><b>年份 :</b> 1972-2072</div>'+
                                    '</div>'+          
                                '</div>'}, 'Childright', ''],
          [{'v':'GrandChild4', 'f':'<div class="image d-flex flex-row justify-content-center align-items-center">'+ 
                                    '<img class="mr-2" src="{{asset('assets/images/profile.jpg')}}" height="100" width="100" />'+ 
                                    '<img class="mr-2" src="{{asset('assets/images/profile.jpg')}}" height="100" width="100" />'+
                                    '<img class="mr-2" src="{{asset('assets/images/profile.jpg')}}" height="100" width="100" />'+
                                    '<img class="mr-2" src="{{asset('assets/images/profile.jpg')}}" height="100" width="100" />'+
                                    '<img class="mr-2" src="{{asset('assets/images/profile.jpg')}}" height="100" width="100" />'+ 
                                '</div>'+
                                '<div class="image d-flex flex-column justify-content-center align-items-center">'+ 
                                    '<div class="container bg-white text-dark mt-2" style="border-radius: 20px">'+
                                        '<div class="row d-flex justify-content-center p-2">'+
                                            '<div class="mr-5">彭子平 （第一代）</div>'+
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
                                        '<div><b>年份 :</b> 1972-2072</div>'+
                                    '</div>'+          
                                '</div>'}, 'Childright', ''],
                                [{'v':'GrandChild2', 'f':'<div class="image d-flex flex-row justify-content-center align-items-center">'+ 
                                    '<img class="mr-2" src="{{asset('assets/images/profile.jpg')}}" height="100" width="100" />'+ 
                                    '<img class="mr-2" src="{{asset('assets/images/profile.jpg')}}" height="100" width="100" />'+
                                    '<img class="mr-2" src="{{asset('assets/images/profile.jpg')}}" height="100" width="100" />'+
                                    '<img class="mr-2" src="{{asset('assets/images/profile.jpg')}}" height="100" width="100" />'+
                                    '<img class="mr-2" src="{{asset('assets/images/profile.jpg')}}" height="100" width="100" />'+ 
                                '</div>'+
                                '<div class="image d-flex flex-column justify-content-center align-items-center">'+ 
                                    '<div class="container bg-white text-dark mt-2" style="border-radius: 20px">'+
                                        '<div class="row d-flex justify-content-center p-2">'+
                                            '<div class="mr-5">彭子平 （第一代）</div>'+
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
                                        '<div><b>年份 :</b> 1972-2072</div>'+
                                    '</div>'+          
                                '</div>'}, 'Childright', '']
                                
        ]);

        // Create the chart.
        var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
        // Draw the chart, setting the allowHtml option to true for the tooltips.
        chart.draw(data, {'allowHtml':true, 'allowCollapse':true, 'size':'medium', 'color':'#FF0000'});
        
      }
</script>
                        
@endsection