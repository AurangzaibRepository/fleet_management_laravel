<div class="page-layout">
    <div class="d-flex">
        <div class="me-3">
            <img src="{{$data->default_image_url_medium}}" id="img-car" />
        </div>
        <div>
            {{Form::label('name', $data->name, ['id' => 'lbl-name'])}}
            <br/>
            <span id="span-specs">{{$data->vehicle_type_name}} - {{$data->year}} {{$data->make}} {{$data->vin}}</span>
            <br/>
            <span><i class="fa fa-circle me-1" color="{{$data->vehicle_status_color}}"></i>{{$data->vehicle_status_name}}</span>
        </div>
    </div>
    
    <div class="tab mt-4">
        <button class="tablinks" onclick="openTab(event, 'tab-overview')">Overview</button>
        <button class="tablinks" onclick="openTab(event, 'tab-specs')">Specs</button>
    </div>
    @include('vehicles.overview')
    @include('vehicles.specs')
</div>