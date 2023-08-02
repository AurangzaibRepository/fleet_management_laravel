<div class="page-layout">
    <div class="d-flex">
        <div class="me-3">
            <img src="{{$data->default_image_url_medium}}" id="img-car" />
        </div>
        <div>
            {{Form::label('name', $data->name, ['id' => 'lbl-name'])}}
            <br/>
            <span id="span-specs">{{$data->vehicle_type_name}} - {{$data->year}} {{$data->make}} {{$data->vin}}</span>
        </div>
    </div>
</div>