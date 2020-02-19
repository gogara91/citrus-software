function createNewComment(id = null) {
    clearErrors();
    const data = {
        name: $('#name').val(),
        email: $('#email').val(),
        body: $('#body').val(),
        product_id: id,
    }

    $.ajax({
        method: 'POST',
        url: '/comments/create',
        data
    }).done(function () {
        $('#add-comment-form').empty().html('<p class="text-success">Successfully added comment. It will be shown on the page after admin approves it.</p>');
    }).fail(function ({responseJSON}) {
        showErrors(responseJSON.data);

    });
}

function showErrors(errors) {
    if(errors.name) {
        $('#name_error').text(errors.name).removeClass('d-none');
    }
    if(errors.email) {
        $('#email_error').text(errors.email).removeClass('d-none');
    }
    if(errors.body) {
        $('#body_error').text(errors.body).removeClass('d-none');
    }
    if(errors.error) {
        alert(errors.error);
    }
}


function clearErrors() {
    $('.text-danger').text('').addClass('d-none');
}

function approveComment(id) {
    $.ajax({
        method: 'POST',
        url: 'comments/update?id=' + id,
        data: {
            approved: 1
        }
    }).done(function(response) {
        $('#comments-holder').load('http://localhost/comments #comments-holder>*');
    }).fail(function({responseJSON}) {
        alert(responseJSON.data.error);
    });
}