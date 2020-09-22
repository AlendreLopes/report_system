$(function () {
    $("#modalUpTodate").click(function () {
        const updateData = this;
        $("#modal")
        .modal("show")
        .find("#modalUpdateData")
        .load($(updateData).attr("value"));
    });
});