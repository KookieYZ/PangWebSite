$(document).ready(function () {
    $("li.nav-item").on("click", function () {
        var id = $(this).attr("id");
        $("#jobDetails" + id).css("display", "block");
        loopAllDiv("jobDetails" + id);
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
