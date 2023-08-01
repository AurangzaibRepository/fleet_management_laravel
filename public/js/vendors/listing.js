$(function() {
    populateVendors(); 
});

function populateVendors() {
    $('#table-vendors').DataTable({
        bLengthChange: false,
        bSort: false,
        searching: false,
        columnDefs: [
            {'targets': 0, 'width': '6%', className: 'text-center'},
            {'targets': 2, 'width': '30%'},
            {'targets': [1,3,4], 'width': '20%'},
        ],
    });
}