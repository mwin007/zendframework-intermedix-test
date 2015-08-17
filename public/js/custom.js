
$(document).ready(function () {

    $("#lb_enabled").on("click", function () {

        $("#IsInsured").toggleClass("hideme");
    });

    $("#lb_married").on("click", function () {

        $("#IsMarried").toggleClass("hideme");
    });
})