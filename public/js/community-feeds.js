var table;
var i = 1;
var feedID;
var isValid;

$(function(){

   populateFeeds();

   $('select').select2({
       dropdownParent: $('#modal-approval')
   });

   $('#modal-approval').on('show.bs.modal', function(e){

        $('.spn-error').css('display', 'none');
        $('.modal-body select').val('').trigger('change');
        $('.modal-body textarea').val('');
        feedID = $(e.relatedTarget).data('id');
   });
});

// Bind datatable page click
$(document).bind('click', 'div.pagination li', function(evt){
    i = ((table.page.info().page + 1) * 10) - 9;
});

function populateFeeds()
{
    table = $('#table-feeds').DataTable({
        'searching': false,
        'bLengthChange': false,
        'bSort': false,
        'serverSide': true,
        'columnDefs': [
            {'targets': 0, 'width':'8%', 'class': 'text-center',
                'render': function() {
                    return i++;
                }},
            {'targets': 1, 'data': 'question'},
            {'targets': 2, 'data': 'user_name'},
            {'targets': 3, 'data': 'category'},
            {'targets': 4, 'data': 'createdAt', 
                'render': function(data){
                    let date = new Date(data);
                    return date.toLocaleDateString('en-GB');
                }
            },
            {'targets': 5, 'data': 'status', 'width': '12%'},
            {'targets': [2,3,4], 'width': '15%'},
            {'targets': 6, 'width': '10%', 
                'render': function(data, type, row){

                    statusString = '<div>';
                    if (row.statusText !== 'accepted'){
                        statusString += `<a data-bs-toggle="modal" data-bs-target="#modal-approval" data-id="${row.id}"><i class="fa fa-check icon-primary"></i></a>`;
                    }

                    if (row.statusText !== 'rejected'){
                        statusString += `<a href="javascript:;" onClick="changeStatus(${row.id}, 'rejected')"><i class="fa fa-times icon-secondary"></i></a>`;
                    }
                    return statusString + '</div>';
                }}
        ],
        'ajax': {
            type: 'POST',
            url: '/community/listing'
        }
    });
}

function approve(){

    isValid = true;
    $('.spn-error').css('display', 'none');

    validateField('categoryid', 'spn-categoryid');
    validateField('answer', 'spn-answer');

    if (isValid)
    {
        changeStatus(feedID, 'accepted');
    }
}

function changeStatus(feedID, status)
{
    $.ajax({
        'type': 'POST',
        'data': {
            feedID: feedID,
            status: status,
            category_id: $('#categoryid').val(),
            answer: $('#answer').val()
        },  
        'url': '/community/change-status',
        success: function(response){
            window.location = '/community/list'
        }
    });
}

function validateField(elementID, errorID)
{
    if ($(`#${elementID}`).val().trim() == ''){
        $(`#${errorID}`).css('display', 'block');
        isValid = false;
    }
}