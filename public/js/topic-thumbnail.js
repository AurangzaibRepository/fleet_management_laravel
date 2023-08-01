function previewThumbnail(obj, elementID) {
    
    $(`#${elementID}`).css('display', 'block');
    $(`#${elementID}`).attr('src', URL.createObjectURL(obj.files[0]) );
}

function validateThumbnail() {

    let file = $('#thumbnail').get(0).files;
    let validImageTypes = ["image/gif", "image/jpeg", "image/png"];

    if (file.length == 0) {
        //$('#error-thumbnail').css('display', 'block');
        //isValid = false;
        return;
    }
    
    if ($.inArray(file[0]['type'], validImageTypes) < 0 ) {
        $('#error-thumbnail').html('Thumbnail must be image file');
        $('#error-thumbnail').css('display', 'block');
        isValid = false;
    }

    if (file[0]['size']/1024/1024 > 5) {
        $('#error-thumbnail').html('Thumbnail cannot be greater than 5MB');
        $('#error-thumbnail').css('display', 'block');
        isValid = false;
    }

}