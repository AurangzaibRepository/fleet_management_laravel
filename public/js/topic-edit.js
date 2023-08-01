var isValid;
$(document).ready(function(){

    $('#modal-delete-topic').on('shown.bs.modal', (e) => {
        
       $('#modal-delete-topic .fa-spinner').css('display', 'none');
       $('#modal-delete-topic [name="topic_id"]').val($(e.relatedTarget).data('topicid') );
       $('#modal-delete-topic #spn-topic').text($(e.relatedTarget).data('topic'));
    });

    $('#modal-edit-topic').on('shown.bs.modal', (e) => {
        $('.spn-error').css('display', 'none');
        $('#modal-edit-topic iframe').css('display', 'block');

        populateTopicData(e);
    });

    $('#modal-edit-topic').on('hidden.bs.modal', (e) => {
        location.reload();
    });
});


function populateTopicData(e) {

    $('#modal-edit-topic [name=topic_id]').val($(e.relatedTarget).data('topicid') );
    $('#modal-edit-topic #type').val( $(e.relatedTarget).data('type') );
    $('#modal-edit-topic #title').val($(e.relatedTarget).data('title') );
    $('#modal-edit-topic iframe').attr('src', $(e.relatedTarget).data('link') );

    let thumbnailLink = $(e.relatedTarget).data('thumbnaillink');

    if (thumbnailLink != null) {
        $('#modal-edit-topic #img-thumbnail').attr('src', thumbnailLink);
        $('#modal-edit-topic #img-thumbnail').css('display', 'block');
    }
}


function deleteTopic() {

    $('#modal-delete-topic .fa-spinner').css('display', 'block');

    $.ajax({
        type: 'DELETE',
        url: '/topics/' + $('#modal-delete-topic [name=topic_id]').val(),
        success: function(response) {
            location.reload();
        }
    });
}

function updateTopic() {
    
    isValid = true;
    $('.spn-error').css('display', 'none');

    validateField('modal-edit-topic #type', 'modal-edit-topic #error-type');
    validateField('modal-edit-topic #title', 'modal-edit-topic #error-title');
    validateEditThumbnail();

    if (isValid) {
        $('#modal-edit-topic .btn-primary').attr('disabled', true);
        $('#modal-edit-topic #dv-loader').css('display', 'inline-flex');

        submitForm('form-edit-topic', '/topics/update');
    }
}

function validateType() {

    let extensionList = [];
    let errorMessage = '';
    let type = $('#modal-edit-topic #type').val();

    if (type === 'article') {
        errorMessage = 'Only word and pdf files are allowed';
        extensionList = ['doc', 'docx', 'pdf'];
    }

    if (type === 'video') {
        extensionList = ['mp4', 'mp3', 'wmv', 'avi', 'mov'];
        errorMessage = 'Only video files are allowed';
    }

    let extension = $('#modal-edit-topic #video').val().split('.').pop();

    if (extensionList.indexOf(extension) === -1) {
        isValid = false;
        $('#modal-edit-topic #error-video').html(errorMessage);
        $('#modal-edit-topic #error-video').css('display', 'block');

        return;
    }

    validateSize();
}

function validateSize() {

    let size = $('#modal-edit-topic #video')[0].files[0].size;
    
    if (size/1024/1024 > 80) {
        isValid = false;
        $('#modal-edit-topic #error-video').text('Maximum file size allowed is 80MB');
        $('#modal-edit-topic #error-video').css('display', 'block');
    }
}


function validateEditThumbnail() {
    let file = $('#form-edit-topic #thumbnail').get(0).files;

    if (file.length === 0) {
        return;
    }

    if (file[0]['size']/1024/1024 > 5) {
        $('#form-edit-topic #error-thumbnail').css('display', 'block');
        isValid = false;
    }
}
