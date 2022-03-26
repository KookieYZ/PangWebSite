
$( document ).ready(function() {
    fetchFamiliyList();
    downLoadPDF();
});

function fetchFamiliyList(){
    $.ajax({
        type:'GET',
        url:"/fetch-family-list",         
        datatype: "json",
        success:function(response){
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
            data.addRows([
                [{
                     v:value.name, 
                    'f':'<a href="/history/'+value.id+'">'+
                        '<div id = "referUsage">'+
                        '<div class="image d-flex flex-row justify-content-center align-items-center" id="firstRow">' +
                        '<img class="mr-3" id="parent_avatar"src="image/avatar/'+value.avatar+ '" height="100" width="100" />' +  
                        '<img class="mr-3" id="spouse_avatar" src="image/avatar/'+value.spouse_avatar+ '" height="100" width="100" style="'+spouse_avatar+'">' +
                        '</div>' +
                        '<div class="image d-flex flex-column justify-content-center align-items-center" id="'+value.name.replace(/\s/g, '')+'">' +
                        '<div class="container bg-white text-dark mt-2" style="border-radius: 20px">' +
                        '<div class="row d-flex justify-content-center p-2">' +
                        '<div style="width: 100px;" class="mr-1" id="name">'+value.name+'<br/> '+value.era+' </div>' +
                        '<div style="width: 100px;" class="mr-1" id="spouse_name'+0+'"><p></p></div>' +
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
                        '</div>' +
                        '</a>'               
                }, value.parent_id, value.name]
            ]);
    })
    createChart(data);
    loopSpouseName(arr,false);  
    // fixedFirstRowCss();
    // fixedImgCss();
      
   
    // $("#chartInputData").val($("#chart_div").html());
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


function fixedFirstRowCss(){ // No use Anymore, So i did not call this function
    $('div#firstRow').each(function () {
        $(this).css('height','104');
        $(this).css('width','236');
        $(this).parent().css('width','240');
        $(this).parent().css('height','180');
    });
}

    function fixedImgCss(){ // No use Anymore, So i did not call this function
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


function loopSpouseName(arr,isDownloadPDF){ // Passing in as Object
    var spouseNameArr = [];
    for(var i = 0; i < arr.length; i++ ){
        spouseNameArr[i] = {
            "Name" : arr[i].name,
            "Spouse_Name" : arr[i].spouse_name != null ? arr[i].spouse_name.split('|') : ""
        }
    }
    if(isDownloadPDF){
        pdfAppendSpouseName(spouseNameArr);
        return;
    }
    appendSpouseName(spouseNameArr);   
}
   //Loop to html page
function appendSpouseName(spouseNameArr){
    for(var i = 0; i < spouseNameArr.length; i++ ){
        $( 'div#'+spouseNameArr[i].Name.replace(/\s/g, '')).each(function( index ) {
            var currentContainer= $(this);
            for(var j = 0; j < spouseNameArr[i].Spouse_Name.length; j++  ){
                if(j>=1){
                    currentContainer.find('div#spouse_name'+(j-1)+'> p').after('<div style="width: 100px;" id="spouse_name'+j+'" class="mr-1"><p></p></div>');
                    // currentContainer.find('div#spouse_name'+j+'> p').text(spouseNameArr[i].Spouse_Name[j]);
                }              
                    currentContainer.find('div#spouse_name'+j+'> p').text(spouseNameArr[i].Spouse_Name[j]);                
                // currentContainer.find('div#name').after('<div style="width: 100px;" id="spouse_name'+j+'" class="mr-1"><p></p></div>');  
            }
    });
}
}

function downLoadPDF(){
    $.ajax({
        type:'GET',
        url:"/fetch-family-list",         
        datatype: "json",
        success:function(response){
            google.charts.load('current', {packages:["orgchart"]});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Name'); // Can be refer by child 
                data.addColumn('string', 'ParentName'); // Current record Parent Name
                data.addColumn('string', 'ToolTip'); // when you cursor hover to it, display the value
                
                $.each(response.familiylist, function( key, value ) {
                data.addRows([
                    [{
                     v:value.name, 
                     f:value.name +                     
                     '<div id="'+value.name.replace(/\s/g, '')+'">'+
                     '<div style="width: 100px;" class="mr-1" id="spouse_name'+0+'">配偶:<p></p></div>' +
                     '</div>'+
                     '<div style="color:red;">年份：'+value.dob_date+'</div>'},
                     value.parent_id, value.name]
                ]);    
                })
            
              
          
                  // Create the chart.
                  var chart = new google.visualization.OrgChart(document.getElementById('hiddenDiv'));
                  // Draw the chart, setting the allowHtml option to true for the tooltips. 
                  chart.draw(data, {
                    'allowHtml': true,
                     'size': 'medium',
                });
                    loopSpouseName(response.familiylist,true);
                      
                  $("#chartInputData").val($("#hiddenDiv").html());
            }                 
    }
});
}

function pdfAppendSpouseName(spouseNameArr){
    for(var i = 0; i < spouseNameArr.length; i++ ){
     $('#hiddenDiv').find( 'div#'+spouseNameArr[i].Name.replace(/\s/g, '')).each(function( index ) {
            var currentContainer= $(this);
            for(var j = 0; j < spouseNameArr[i].Spouse_Name.length; j++  ){
                if(j>=1){
                    currentContainer.find('div#spouse_name'+(j-1)+'> p').after('<div style="width: 100px;" id="spouse_name'+j+'" class="mr-1"><p></p></div>');
                   
                }                           
                    currentContainer.find('div#spouse_name'+j+'> p').text(spouseNameArr[i].Spouse_Name[j]);
            }
    });
}
}
 

