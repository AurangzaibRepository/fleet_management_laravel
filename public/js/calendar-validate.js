var isValid;

function validateForm() {

    isValid = true;
    $('.spn-error').css('display', 'none');

    validateField('reminder', 'error-reminder');
    validateField('place', 'error-place');
    validateField('grades', 'error-grades');
    validateField('priorities', 'error-priorities');
    validateField('date', 'error-date');
    validateField('time', 'error-time');
    validateField('repeat', 'error-repeat');
    validateField('user_id', 'error-user');

    return isValid;
}

function validateField(elementID, errorID) {

    if ($(`#${elementID}`).val().trim() === '' ) {

        $(`#${errorID}`).css('display', 'block');
        isValid = false;
    }
}