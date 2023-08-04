$(function() {
    populateFuelHistory();
});

function populateFuelHistory() {
    $('#table-fuel-history').DataTable({
        'bLengthChange': false,
        'bSort': false,
        'searching': false,
        'columnDefs': [
            {'targets': 0, 'width': '6%', 'className': 'text-center'},
            {'targets': [1,2,3,4], 'width': '24%'},
            {'targets': 5, 'width': '5%',
                'className': 'text-center', 'data': null,
                'render': function(row, data) {
                    return `
                        <a href="/fuel-history/${row[5]}"><i class="fas fa-eye"></i></a>
                    `;
                },
            },
        ],
    });
}