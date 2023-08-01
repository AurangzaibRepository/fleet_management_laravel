var  userDropdown = $('#user_id');
var edit = $('[name=id]').length;

$(function() {
    
    initializeDatepicker();
    initializeTimepicker();
    initializeUserDropdown();
});

function initializeDatepicker() {
    $('#date').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });

    $('#date').val('');

    $('#date').on('apply.daterangepicker', function(ev, picker) {
        $('#date').val(picker.startDate.format('DD/MM/YYYY'));
    });

    $('#date').on('hide.daterangepicker', function(ev, picker) {
        $('#date').val(picker.startDate.format('DD/MM/YYYY'));
    });
}

function initializeTimepicker() {
    $('#time').daterangepicker({
        singleDatePicker: true,
        timePicker: true,
        timePicker24Hour: true,
        timePickerSeconds: true,
        locale: {
            format: 'HH:mm:ss'
        }
    }).on('show.daterangepicker', function(ev, picker) {
        picker.container.find('.calendar-table').hide();
    });

    $('#time').val('');
}

function initializeUserDropdown() {
    $.get(`/users/all`,
    function(response) {

        $.each(response, function(key, value) {
            userDropdown.append(`<option value="${value.id}">${value.user_name}</option>`);
        });
       
        if (edit) {
            selectUser();
        }   
    });

    $('select').select2();
}