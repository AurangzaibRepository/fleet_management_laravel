$(document).ready(function(){
    
    PopulateUsers();
});

function PopulateUsers()
{
    $('#table-whatsapp').DataTable({
        'bLengthChange': false,
        'bSort': false,
        'searching': false,
        'destroy': true,
        'serverSide': true,
        'language': {
            'emptyTable': 'No records found'
        },
        columnDefs: [
            {targets:[0,1,2], width: '30%'},
            {targets: 3, width: '10%', data:null,
            render: function(data, type, row, meta){
                return `<a href='https://web.whatsapp.com/send?phone=${data[2]}' target='_blank'> <i class="fab fa-whatsapp"></i></a>`
            }
        }
        ],
        ajax: {
            url: '/whatsapp-sessions/listing',
            type: 'POST',
            data: {
                name: $('input[name="name"]').val(),
                phone: $('input[name="phone"]').val()
            }
        }
    });
}

function resetFilters() {

    $('#form-filter').trigger('reset');
    PopulateUsers();
}