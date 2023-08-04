$(function() {
    populateFuelHistory();
});

function populateFuelHistory() {
    $('#table-fuel-history').DataTable({
        'bLengthChange': false,
        'bSort': false,
        'searching': false,
        'ajax': '/fuel-history/listing',
        'initComplete': function(settings, json) {
            $('#label-total-fuel').val(json.totalFuelCost);
            $('#label-total-volume').val(json.totalVolume);
            $('#label-avg-fuel').val(json.avgFuelEconomy);
            $('#label-avg-cost').val(json.avgCost);
        },
        'columnDefs': [
            {'targets': 0, 'width': '6%', 'className': 'text-center'},
            {'targets': 1, 'width': '30%'},
            {'targets': [2,3,4], 'width': '20%'},
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