<div class="modal" id="modal-subcategory">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <label>Add Subcategory</label>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">      
                        {{Form::label('subcategory', 'Subcategory')}}
                        {{Form::text('subcategory', null, ['class' => 'form-control'])}}
                        <span class="spn-error" id="spn-subcategory">Subcategory required</span>
                    </div>
                    <div class="col-12">
                        {{Form::label('status', 'Status')}}
                        {{Form::select('status', $statusArray, null, ['class' => 'form-select'])}}
                        <span class="spn-error" id="error-status">Status required</span>
                    </div>
                    <div class="col-12">
                        {{Form::label('introduction_text', 'Introduction Text')}}
                        {{Form::textarea('introduction_text', null, ['class' => 'form-control'])}}
                        <span class="spn-error" id="error-introduction">Introduction required</span>
                    </div>
                    <div class="col-12 text-end col-buttons">
                        {{Form::button('Save', ['class' => 'btn btn-primary', 'onClick' => 'save()'])}}
                        {{Form::button('Cancel', ['class' => 'btn btn-secondary', 'data-bs-dismiss' => 'modal'])}}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>