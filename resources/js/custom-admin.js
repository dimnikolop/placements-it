$(function () {
    $("#sidebarToggler").on('click', function () {
        $(".sidebar").toggle();
    });

    // Show on file input the name of the selected file
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
});