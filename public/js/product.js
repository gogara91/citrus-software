function createProduct() {
    hideErrors();
    const data = {
        title: $('#title').val(),
        description: $('#description').val(),
        image: $('#image').val(),
    };

    $.ajax({
        method: 'POST',
        url: '/products/store',
        data
    }).done(function({data}){
        window.location.href= '/product?id=' + data.product_id;
    }).fail(function({responseJSON}) {
        showErrors(responseJSON.data);
    });
}

function showErrors(errors) {
    if(errors.title) {
        $('#title_error').text(errors.title).removeClass('d-none');
    }
    if(errors.image) {
        $('#image_error').text(errors.image).removeClass('d-none');
    }
    if(errors.description) {
        $('#description_error').text(errors.description).removeClass('d-none');
    }
    if(errors.error) {
        alert(errors.error);
    }
}

function hideErrors() {
    $('.text-danger').addClass('d-none');
}

