$(function() {
    populateVehicles();
});

function populateVehicles() {
    $('#table-vehicles').DataTable({
        'searching': false,
        'bLengthChange': false,
        'bSort': false,
    });
}