<div class="page-layout d-flex justify-content-between">
    {{Form::label('name', 'Fuel Entry #'.$data['details']['id'], ['id' => 'module-header'])}}
    <a href="{{route('fuelHistories')}}" class="btn-primary">Back</a>
</div>

<div class="mt-4">
    <div class="row">
        <div class="col-md-6">
            @include('fuel-history.overview')
        </div>
        <div class="col-md-6">
            @include('fuel-history.specs')
        </div>
    </div>
</div>