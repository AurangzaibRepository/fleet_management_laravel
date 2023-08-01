$(function() {
    selectDate();
    selectTime();
});

function selectUser() {
    userDropdown.val($("[name=hdn_userid]").val());
}

function selectDate() {
    $('#date').val($("[name=hdn_date]").val() );
}

function selectTime() {
    $('#time').val($('[name=hdn_time]').val());
}