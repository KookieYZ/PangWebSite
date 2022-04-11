$(document).ready(function () {
    $("li.nav-item").on("click", function () {
        var id = $(this).attr("id");
        $("#details" + id).css("display", "block");
        var historyName = $("#details" + id).find("#hiddenHistoryName").attr('value');
        $('div#history_name').text(historyName);
        loopAllDiv("details" + id);
        $("p#numOfHistory").text("");
    });
});

function loopAllDiv(id) {
    $("div.referUsage").each(function () {
        var currentContainerID = $(this).attr("id");
        if (currentContainerID != id) {
            $(this).css("display", "none");
        }
    });
}
