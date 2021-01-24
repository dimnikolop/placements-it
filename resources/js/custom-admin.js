// Open collapsed div with nav links if browser url is either of those links
if (window.location.pathname === '/stats/student' || window.location.pathname === '/stats/graduate') {
    $('#collapseEvaluation').collapse('show');
    $('a[data-toggle="collapse"]').addClass('active');
}

$(function () {

    //    sidebar toggle

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

    // Show on file input the name of the selected file
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    //    tool tips
    $('[data-toggle="tooltip"]').tooltip();

    $('[data-toggle="tooltip"]').on('click', function() {
        $(this).tooltip('hide');
    });

    //    popovers
    $('[data-toggle="popover"]').popover();

    //    On delete pass url to modal delete form
    $(".deleteBtn").on('click', function () {
        const url = $(this).data('url');
        $('#deleteForm').attr('action', url);
    });

    //    Modify DataTables

    $('#announcementsTable').DataTable({
        //responsive: true
        "order": [[0, 'desc']]
    });

    $('#companiesTable').DataTable({
        //responsive: true
    });

    $('#graduatesTable').DataTable({
        //responsive: true
    });
});