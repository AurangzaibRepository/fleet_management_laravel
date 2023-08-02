@extends('/layouts/main')
@push('styles')
<link rel="stylesheet" href="{{asset('/css/vehicles/listing.css')}}" />
@endPush

@section('contents')
{{Form::label('lbl-page-header', 'Vehicles', ['id' => 'lbl-page-header'])}}

<div class="dv-base">
    <div class="page-layout">
        <table id="table-vehicles" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Type</th>
                    <th></th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@endSection