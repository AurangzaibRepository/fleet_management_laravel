$(document).ready(function(){

    // Function to populate users
    PopulateUsers();

    $('#modal-user').on('shown.bs.modal', function(e){
        let name= $(e.relatedTarget).data('name');
        let country = $(e.relatedTarget).data('country');
        let joiningDate = $(e.relatedTarget).data('created-at');
        let lastActive = $(e.relatedTarget).data('last-active');
        let phoneNumber = $(e.relatedTarget).data('phone-no');

        $('#modal-user #name').text(name);
        $('#modal-user #country').text(country);
        $('#modal-user #registered-date').html(joiningDate);
        $('#modal-user #last-active').text(lastActive);
        $('#modal-user #phone-no').html(phoneNumber);
    });

    $('#btn-reset').on('click', function(e){

        e.preventDefault();
        $('#form-filter')[0].reset();
        $('select[name=status]').prop('selectedIndex',0);
        $('#new').prop('checked', false);
        PopulateUsers();
    });

    $('#search').click(function(e){
        e.preventDefault();
        PopulateUsers();
    });

    InitializeDatepicker();

});

// Function to populate users
function PopulateUsers()
{
    $('#table-users').DataTable({
        'searching': false,
        'lengthChange': false,
        'bSort': false,
        'destroy': true,
        //'ajax': '/users-listing',
        'ajax': {
            type: 'POST',
            url : '/users-listing',
            data: {
                username: $('input[name=username]').val(),
                phone: $('input[name="phone"]').val(),
                status: $('select[name=status]').val(),
                joining_date: $('input[name=joining_date]').val(),
                new: $('#new')[0].checked,
                whatsapp: $('#whatsapp')[0].checked
            }
        },
        columnDefs:[
            {'targets': [0,1,2,3], 'width': '15%' },
            {'targets': 4, 'width': '10%'},
            {'targets': 5, 'width': '10%', 'data': null,
            render: function(row, data){

            if (row[4] === 'Active'){
                icon = 'fa-toggle-on';
                status = 'Inactive';
            }

            if (row[4] === 'Inactive'){
                icon = 'fa-toggle-off';
                status = 'Active';
            }

            return `
            <div>
            <a class="user-modal" data-bs-toggle="modal" data-bs-target="#modal-user" data-name="${row[0]}" data-last-active="${row[3]}" 
            data-country="${row[5]}"
            data-phone-no="${row[6]}" data-created-at="${row[7]}">
            <i class="far fa-question-circle"></i></a>
            <a class="change-status" onClick="confirmStatusChange(${row[1]}, '${status}')">
            <i class="fa ${icon}"></i>
            </a>
            <a onClick="confirmDelete(${row[1]}, '${row[0]}')"> <i class="fa fa-trash-alt"></i></a>
            </div>
            `;
        }}
        ]
    });
}

function confirmStatusChange(userID, status)
{
    let statusText = (status === 'Active' ? 'activate' : 'deactivate');

    if (confirm(`Are you sure you want to ${statusText}?`))
    {
        window.location.href = `/users/change-status/${userID}/${status}`;
    }
}

function confirmDelete(userID, userName) {

    if (confirm(`Are you sure you want to delete ${userName}?`)) {
        window.location.href = `/users/delete/${userID}`;
    }
}

function InitializeDatepicker(){
    $('#joining_date').daterangepicker({
        format: 'DD/MM/YY'
    });
    $('#joining_date').val('');

    $('#joining_date').on('cancel.daterangepicker', function(ev, picker){
        $('#joining_date').val('');
    });

    $('#joining_date').on('apply.daterangepicker', function(ev, picker) {
        $('#joining_date').val(picker.startDate.format('DD/MM/YYYY')+ ' - ' + picker.endDate.format('DD/MM/YYYY'));
      });

      $('#joining_date').on('hide.daterangepicker', function(ev, picker){
          $('#joining_date').val(picker.startDate.format('DD/MM/YYYY')+ ' - '+ picker.endDate.format('DD/MM/YYYY'));
      });
} 
