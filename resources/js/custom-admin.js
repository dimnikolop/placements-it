$(function () {
    $("#sidebarToggler").on('click', function () {
        $(".sidebar").toggle();
    });

    // Show on file input the name of the selected file
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    $('[data-toggle="popover"]').popover()

    // Get announcement id to delete
    $(".deleteBtn").on('click', function() {
        const url = $(this).data('url');
        $('#deleteForm').attr('action', url);
    });

    // Modify DataTables
    $('#announcementsTable').DataTable({
        //responsive: true
        "order": [[ 0, 'desc' ]]
    });

    $('#companiesTable').DataTable({
        //responsive: true
    });

    $('#graduatesTable').DataTable({
        //responsive: true
    });
});