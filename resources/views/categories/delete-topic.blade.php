<div class="modal" id="modal-delete-topic">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                {{Form::label('header-label', 'Delete Topic')}}
            </div>
            <div class="modal-body">
                <i class="fas fa-spin fa-spinner"></i>
                <div class="row">
                    <div class="col-12 mb-3">
                        {{Form::hidden('topic_id')}}
                        <label>Are you sure you want to delete <span id="spn-topic"></span>?</label>
                    </div>
                    <div class="col-12 text-end">
                        {{Form::button('Yes', ['class' => 'btn btn-primary', 'onClick' => 'return deleteTopic()'])}}
                        {{Form::button('No', ['class' => 'btn btn-secondary', 'data-bs-dismiss' => 'modal'])}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>