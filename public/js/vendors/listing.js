$(function() {
    populateVendors(); 
});

function populateVendors() {
    $('#table-vendors').DataTable({
        bLengthChange: false,
        bSort: false,
        searching: false,
        ajax: '/vendors/listing',
        columnDefs: [
            {'targets': 0, 'width': '6%', className: 'text-center'},
            {'targets': 2, 'width': '30%'},
            {'targets': [1,3,4], 'width': '20%'},
            {'targets': 5, className: 'text-center',
                data:null, 'width': '8%',
                render: function(row, data) {
                    return `
                    <a href="/vendors/${row[5]}"><i class="fas fa-eye"></i></a>
                    `;
                }
            }
        ],
    });
}