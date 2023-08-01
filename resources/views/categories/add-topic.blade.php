<div class="modal" id="modal-add-topic">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                {{Form::label('header-label', 'Add Topic')}}
            </div>
            <div class="modal-body">
                {{Form::open(['route' => 'addTopic', 'files' => true, 'id' => 'form-topic'])}}
                {{Form::hidden('sub_category_id', $data->id)}}
                {{Form::hidden('category_id', $data->category_id)}}

                <div id="dv-loader">
                    <i class="fas fa-spin fa-spinner"></i>
                    <span></span>
                </div>

                <div class="row">
                    <div class="col-12 mb-3">
                        {{Form::label('type', 'Type')}}
                        {{Form::select('type', $topicTypes, null, ['class' => 'form-select field'])}}
                        <span class="spn-error" id="error-type">Type required</span>
                    </div>
                    <div class="col-12 mb-3">
                        {{Form::label('topic', 'Title')}}
                        {{Form::text('topic', null, ['class' => 'form-control field'])}}
                        <span class="spn-error" id="error-topic">Title required</span>
                    </div>
                    <div class="col-12 mb-3">
                        {{Form::label('thumbnail', 'Thumbnail')}}
                        <img id="img-thumbnail"></img>
                        {{Form::file('thumbnail', [
                        'onchange' => "previewThumbnail(this, 'form-topic #img-thumbnail')"
                        ])}}
                        <span class="spn-error" id="error-thumbnail">Thumbnail required</span>
                    </div>
                    <div class="col-12" id="dv-video">
                        {{Form::label('video', 'Select File')}}
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" id="iframe-video" allowfullscreen></iframe>
                        </div>

                        {{Form::file('video', ['onChange' => 'updateVideo(this, "modal-add-topic")', 'class' =>
                        'field'])}}
                        <span class="spn-error" id="error-video">File required</span>
                    </div>
                    <div class="col-12 text-end">
                        {{Form::submit('Save', ['class' => 'btn btn-primary', 'onClick' => 'return validateTopic()'])}}
                        {{Form::button('Cancel', ['class' => 'btn btn-secondary', 'data-bs-dismiss'
                        => 'modal'])}}
                    </div>
                </div>
            </div>
            {{Form::close()}}
        </div>
    </div>
</div>
</div>