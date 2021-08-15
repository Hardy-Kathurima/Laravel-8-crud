$(document).ready(function () {
    $(".alert")
        .delay(3000)
        .slideUp(200, function () {
            $(this).alert("close");
        });
    $(".show-form").click(function () {
        $(".edit").toggleClass("edit-form");
    });
});
