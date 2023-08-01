var isValid;

$(function() {
    initializeSlick();

    $('#modal-category').on('shown.bs.modal', (e) => {
        $('.spn-error').css('display', 'none');
        $('#error-response').css('visibility', 'hidden');
        $('.modal-body #category, .modal-body #status').val('');
        $('.modal-body #publish').prop('checked', false);
    });
});

function initializeSlick() {
    $('.logo-topics').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: true,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 2
            }
        }]
    });
}

function addCategory() {

    isValid = true;
    $('.spn-error').css('display', 'none');

    validateField('category', 'spn-category');
    validateField('status', 'spn-status');

    if (!isValid) {
        return;
    }

    $.ajax({
        'type': 'POST',
        'data': {
            category: $('#category').val(),
            status: $('#status').val(),
            published: ($('#publish').is(':checked') ? 1 : 0)
        },
        'url': 'categories/add',
        success: function() {
            window.location = '/topics';
        },
        error: function(xhr, status, error) {
            $('#error-response').css('visibility', 'visible');
        }
    });
}

function validateField(elementID, errorID) {

    if ($(`#${elementID}`).val().trim() === '') {
        
        isValid = false;
        $(`#${errorID}`).css('display', 'block');
    }
}
