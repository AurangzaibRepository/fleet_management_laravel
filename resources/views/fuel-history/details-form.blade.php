<div class="page-layout">
    {{Form::label('name', 'Fuel Entry #'.$data['id'], ['id' => 'module-header'])}}
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