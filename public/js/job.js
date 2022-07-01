$(document).ready(function () {
    $("li.nav-item").on("click", function () {
        var id = $(this).attr("id");
        $("#jobDetails" + id).css("display", "block");
        loopAllDiv("jobDetails" + id);
    });

    //Filtering According Name
    var $div = $('#filter > li');

    $('#search').keyup(function () {
        var selectedValue = $.trim($("#filterCat option:selected").text().replace(/\s+/g, ' '));
        if (selectedValue == "--未选择--") {
            var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
            $div.show().filter(function () {
                var text = $(this).find('#businessName').text().replace(/\s+/g, ' ').toLowerCase();
                return !~text.indexOf(val);
            }).hide();
        }
        else {
            $div.each(function (results) {
                if (results != 0) {
                    var busiessName = $.trim($(this).find("#businessName").text().replace(/\s+/g, ' ')).toLowerCase();
                    var categoryName = $.trim($(this).find("#businessCat").text().replace(/\s+/g, ' ')).toLowerCase();
                    var searchBusiessName = $.trim($('#search').val()).replace(/ +/g, ' ').toLowerCase();
                    var searchCategoryName = $.trim($("#filterCat option:selected").text().replace(/\s+/g, ' ')).toLowerCase();
                    if (categoryName.indexOf(searchCategoryName) != 0 || busiessName.indexOf(searchBusiessName) != 0 ) {
                        $(this).hide();
                    }
                    else {
                        $(this).show();
                    }
                }

            });
        }
    });

});

function loopAllDiv(id) {
    $("div.jobRefer").each(function () {
        var currentContainerID = $(this).attr("id");
        if (currentContainerID != id) {
            $(this).css("display", "none");
        }
    });
}

$('#filterCat').change(function () {
    var selectedValue = $.trim($("#filterCat option:selected").text().replace(/\s+/g, ' '));
    if (selectedValue == "--未选择--") {
        $('#filter > li').show();// display all
        return;
    }
    else {
        var $div = $('#filter > li');
        if (!$('#search').val())// is empty
        {
            
            $div.show().filter(function () {
                var text = $(this).find('#businessCat').text().replace(/\s+/g, ' ').toLowerCase();
                return !~text.indexOf(selectedValue);
            }).hide();
        } else {
            $div.each(function (results) {
                if (results != 0) {
                    var busiessName = $.trim($(this).find("#businessName").text().replace(/\s+/g, ' ')).toLowerCase();
                    var categoryName = $.trim($(this).find("#businessCat").text().replace(/\s+/g, ' ')).toLowerCase();
                    var searchBusiessName = $.trim($('#search').val()).replace(/ +/g, ' ').toLowerCase();
                    var searchCategoryName = $.trim($("#filterCat option:selected").text().replace(/\s+/g, ' ')).toLowerCase();
                    if (categoryName.indexOf(searchCategoryName) == 0 && busiessName.indexOf(searchBusiessName) >= 0 ) {
                        $(this).show();
                    }
                    else {
                        $(this).hide();
                    }
                }

            });
        }


    }

});





