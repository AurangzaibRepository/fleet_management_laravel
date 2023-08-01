var feedID;
var isValid;

$(document).ready(function(){

    $('select').select2({
        dropdownParent: $('#modal-approval')
    });

    $('#modal-approval').on('show.bs.modal', function(e){
        $('.spn-error').css('display', 'none');
        $('.modal-body select').val('').trigger('change');
        $('.modal-body textarea').val('');
        feedID = $(e.relatedTarget).data('id');
    });
});

function approveFeed()
{
    isValid = true;
    $('.spn-error').css('display', 'none');

    validateField('categoryid', 'spn-categoryid');
    validateField('answer', 'spn-answer');

    if (!isValid){
        return false;
    }

    changeStatus(feedID, 'accepted');
}

function changeStatus(feedID, status)
{
    $.post('/community/change-status', {
        feedID: feedID,
        status: status,
        answer: $('#answer').val(),
        category_id: $('#categoryid').val()
    }, 
    function(response){
        window.location = '/community';
    });
}

function validateField(elementID, errorID)
{
    if ($(`#${elementID}`).val().trim() === '')
    {
        $(`#${errorID}`).css('display', 'block');
        isValid = false;
    }
}