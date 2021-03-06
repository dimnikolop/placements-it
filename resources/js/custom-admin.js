$(function () {

    // Sidebar toggle
    function responsiveView() {
        var wSize = $(window).width();
        if (wSize <= 991.98) {
            $('#sidebar > ul').hide();
        }
        if (wSize > 991.98) {
            $('#sidebar > ul').show();
        }
    }
    responsiveView();
    $(window).on('resize', responsiveView);

    $('#sidebarToggler').on('click', function () {
        if ($('#sidebar > ul').is(":visible") === true) {
            $('#main-container').css({
                'margin-left': '0px'
            });
            $('#sidebar').css({
                'margin-left': '-235px'
            });
            $('#sidebar > ul').hide();
        } 
        else {
            $('#main-container').css({
                'margin-left': '235px'
            });
            $('#sidebar > ul').show();
            $('#sidebar').css({
                'margin-left': '0'
            });
        }
    });

    // Enable all tooltips
    $('[data-toggle="tooltip"]').tooltip();

    // Enable all popovers
    $('[data-toggle="popover"]').popover();

    // Hide sidebar toggler tooltip after clicked
    $('#sidebarToggler').on('click', function() {
        $(this).tooltip('hide');
    });

    // Pass delete url to modal delete form
    $(document).on('click', '.deleteBtn', function () {
        const url = $(this).data('url');
        $('#deleteForm').attr('action', url);
    });

    /* Enable DataTables */

    $('#announcementsTable').DataTable({
        //responsive: true
        "order": []
    });

    $('#companiesTable').DataTable({
        //responsive: true
        "order": []
    });

    // On file input display the name of the selected file
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

});


// Open collapsed div with nav links if browser url is either of those nav links
if (window.location.pathname === '/stats/trainee' || window.location.pathname === '/stats/graduate') {
    $('#collapseEvaluation').collapse('show');
    $('a[data-toggle="collapse"]').addClass('active');
}