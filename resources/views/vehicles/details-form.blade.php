<div class="page-layout">
    <div class="d-flex">
        <div class="me-3">
            <img src="{{$data['image']}}" id="img-car" />
        </div>
        <div>
            {{Form::label('name', $data['details']['name'], ['id' => 'lbl-name'])}}
            <br/>
            <span id="span-specs">{{$data['details']['type']}} - {{$data['details']['year']}} {{$data['details']['make']}} {{$data['details']['vin']}}</span>
            <br/>
            <span><i class="fa fa-circle me-1" color="{{$data['status_color']}}"></i>{{$data['status']}}</span>
        </div>
    </div>
    
    <div class="tab mt-4">
        <button class="tablinks" onclick="openTab(event, 'tab-overview')">Overview</button>
        <button class="tablinks" onclick="openTab(event, 'tab-specs')">Specs</button>
    </div>
</div>
<div class="mt-4">
@include('vehicles.overview')
@include('vehicles.specs')
</div>