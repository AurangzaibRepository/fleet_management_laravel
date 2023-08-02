$(function() {
    populateVehicles();
});

function populateVehicles() {
    $('#table-vehicles').DataTable({
        'searching': false,
        'bLengthChange': false,
        'bSort': false,
        'ajax': '/vehicles/listing',
        'columnDefs': [
            {'targets': 0, 'width': '6%', 'className': 'text-center'},
            {'targets': 1, 'width': '25%'},
            {'targets': [2,3,4], 'width': '15%'},
            {'targets': 5, 'width': '5%',
                'className': 'text-center', 'data': null,
                'render': function(row, data) {
                    return `
                    <a href="/vehicles/${row[5]}"><i class="fas fa-eye"></i></a>
                    `;
                }
            },
        ],
    });
}