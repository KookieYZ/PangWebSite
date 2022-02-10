
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
      mappingValue(data,familiylist);  
    }  
     
}

function mappingValue(data,arr){
    $.each(arr, function( key, value ) {
        data.addRows([
        [{
             v:value.name, 
            'f': '<div class="image d-flex flex-row justify-content-center align-items-center">' +
                '<img class="mr-3" src='+value.avatar+ 'height="100" width="100" />' +
                '<img class="mr-3" src='+value.spouse_avatar+ 'height="100" width="100" />' +
                '</div>' +
                '<div class="image d-flex flex-column justify-content-center align-items-center">' +
                '<div class="container bg-white text-dark mt-2" style="border-radius: 20px">' +
                '<div class="row d-flex justify-content-center p-2">' +
                '<div style="width: 100px;" class="mr-1">彭子平<br/>（第'+(key+1)+'代）</div>' +
                '<div style="width: 100px;" class="mr-1">'+value.spouse_name+'</div>' +
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
          createChart(data);
    });
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
