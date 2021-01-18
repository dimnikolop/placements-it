$('#loginModal').on('shown.bs.modal', function () {
    $('#inputUsername').trigger('focus')
})

// Ajax Login Form
$("#loginForm").on('submit', function (event) {
    event.preventDefault();
    var form_data = $(this).serialize();
    $.ajax({
        url: "/login",
        method: "POST",
        data: form_data,
        dataType: "JSON",
        success: function (response) {
            if (response.error) {
                // Clean error message templates from previous errors
                $(".invalid-feedback").text('');
                $("#inputUsername").removeClass("is-invalid");
                $("#inputPassword").addClass("is-invalid");
                $("#inputPassword").next().text(response.error);
            }
            else {
                // console.log(response.success);
                window.location.href = response.url;
            }
        },
        error: function (response) {
            // console.log('Houston, we have a problem!');
            const errors = response.responseJSON.errors;

            // Clean error message templates from previous errors
            $(".invalid-feedback").text('');
            $("#loginForm input").each(function () {
                if ($(this).hasClass("is-invalid")) { $(this).removeClass("is-invalid") }
            });

            // loop through inputs with errors and show error msg
            $.each(errors, function (fieldName, error) {
                let field = $("#loginForm").find('[name="' + fieldName + '"]');
                field.addClass("is-invalid");
                let immediateSibling = field.next();
                if (immediateSibling.hasClass('invalid-feedback')) {
                    immediateSibling.text(error[0]);
                }
                else {
                    field.after("<div class='invalid-feedback'>" + error + "</div>")
                }
            });
        }
    });
});

$(".clickable-row").on('click', function() {
    let url = $(this).data('url');
    window.location.href = url;
});

$('.edit-job').on('click', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var job = $(this).data('job') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    $('#editJobForm').attr('action', '/jobs/' + job.id);
    $('#jobTitle').val(job.title);
    $('#jobDescription').val(job.description);
    $('#jobRequirements').val(job.requirements);
});

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
});

$(function () {
    var sections = $('.form-section');

    function navigateTo(index) {
        sections.removeClass('current').eq(index).addClass('current');
        $('.form-navigation .previous').toggle(index > 0);
        var atTheEnd = index >= sections.length - 1;
        $('.form-navigation .next').toggle(!atTheEnd);
        $('.form-navigation [type=submit]').toggle(atTheEnd);
    }

    function curIndex() {
        return sections.index(sections.filter('.current'));
    }

    $('.form-navigation .previous').on('click', function() {
        navigateTo(curIndex()-1);
    });

    $('.form-navigation .next').on('click', function() {
        navigateTo(curIndex()+1);
    });

    navigateTo(0);
});