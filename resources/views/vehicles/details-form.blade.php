<div class="page-layout">
    <div class="d-flex">
        <div>
            <img src="{{$data->default_image_url_medium}}" />
        </div>
        <div>
            {{Form::label('name', $data->name, ['id' => 'lbl-name'])}}
        </div>
    </div>
</div>