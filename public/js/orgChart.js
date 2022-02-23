
$( document ).ready(function() {
    fetchFamiliyList();
});

function fetchFamiliyList(){
    $.ajax({
        type:'GET',
        url:"/fetch-family-list",         
        datatype: "json",
        success:function(response){
            console.log(response.familiylist);
            googleOrgChartInitialization(response.familiylist);  
        } 
    });
}

function googleOrgChartInitialization(familiylist){
    google.charts.load('current', {packages:["orgchart"]});
    google.charts.setOnLoadCallback(drawChart); 
    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Name'); // Can be refer by child 
        data.addColumn('string', 'ParentName'); // Current record Parent Name
        data.addColumn('string', 'ToolTip'); // when you cursor hover to it, display the value
     //Mapping value
      mappingValue(data, familiylist);  
    }  
     
}

function mappingValue(data, arr){
    $.each(arr, function( key, value ) {
        var spouse_avatar = value.spouse_avatar =='noimage.jpg' && value.spouse_name == null ? "display:none" :value.spouse_avatar;
        var spouse_name = value.spouse_name == null ? "" :value.spouse_name;
        data.addRows([
        [{
             v:value.name, 
            'f':'<div id = "referUsage">'+
                '<div class="image d-flex flex-row justify-content-center align-items-center" id="firstRow">' +
                '<img class="mr-3" id="parent_avatar"src="image/avatar/'+value.avatar+ '" height="100" width="100" />' +  
                '<img class="mr-3" id="spouse_avatar" src="image/avatar/'+value.spouse_avatar+ '" height="100" width="100" style="'+spouse_avatar+'">' +
                '</div>' +
                '<div class="image d-flex flex-column justify-content-center align-items-center">' +
                '<div class="container bg-white text-dark mt-2" style="border-radius: 20px">' +
                '<div class="row d-flex justify-content-center p-2">' +
                '<div style="width: 100px;" class="mr-1">'+value.name+'<br/>（第'+(key+1)+'代）</div>' +
                '<div style="width: 100px;" id="spouse_name" class="mr-1"><p>'+spouse_name+'</p></div>'+
                '</div>' +            
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="container bg-white text-dark mt-2">' +
                '<div class="row text-justify p-2">' +
                '<div><b>性别 :</b>'+value.gender+'</div>' +
                '</div>' +
                '<div class="row text-justify p-2">' +
                '<div><b>国籍 :</b>'+value.nationality+'</div>' +
                '</div>' +
                '<div class="row text-justify p-2">' +
                '<div><b>州属 :</b>'+value.state + '</div>' +
                '</div>' +
                '<div class="row text-justify p-2">' +
                '<div><b>年份 :</b>'+ value.dob_date+'</div>' +
                '</div>'                 
        }, value.parent_id, value.name]
    ]);      
    });
    createChart(data);
    fixedFirstRowCss();
    fixedImgCss();
    $("#chartInputData").val($("#chart_div").html());
}


function createChart(data){    
    var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
    // Draw the chart, setting the allowHtml option to true for the tooltips.
    chart.draw(data, {
        'allowHtml': true,
        'allowCollapse': true,
         'size': 'medium',
        'color': '#FF0000'
    });
}


function fixedFirstRowCss(){
    $('div#firstRow').each(function () {
        $(this).css('height','104');
        $(this).css('width','236');
        $(this).parent().css('width','240');
        $(this).parent().css('height','180');
    });
}

    function fixedImgCss(){
        $('img#spouse_avatar').each(function () { 
            if($(this).attr('src') == 'image/avatar/noimage.jpg' && $(this).parent().parent().find('div#spouse_name >p').text() == '')          
                $(this).parent().find('img#parent_avatar').removeClass('mr-3');
            });    
}



// $( "#printPDFBtn" ).click(function() {
//     getData();
//   });

// function getData(){
//     let chartsData = $("#chart_div").html();
//     $("#chartInputData").val(chartsData);
// }  



function downLoadPDF(){
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    $.ajax({
        type:'GET',
        url:"/downloadPDF",         
        datatype: "json",
        data:$("#chart_div").html()
    });
}