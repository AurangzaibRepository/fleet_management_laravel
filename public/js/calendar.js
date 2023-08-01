$(function(){

    populateReminders();
});

function populateReminders() {

    $('#table-reminders').DataTable({

        'searching': false,
        'bLengthChange': false,
        'bSort': false,
        'columnDefs': [{
            'targets': 0,
            'width': '8%',
            'class': 'text-center'
        },
        {
            'targets': 5,
            'class': 'text-center',
            'width': '10%',
            render: function(data, row) {
                return `
                        <a href="/calendar/edit/${data}"><i class="far fa-edit"></i></a>
                        <a href="/calendar/delete/${data}"> <i class="fa fa-times"></i> </a>
                        `;
            }
        }
        ],
        'serverSide': true,
        'ajax': '/calendar/listing'
    });
}