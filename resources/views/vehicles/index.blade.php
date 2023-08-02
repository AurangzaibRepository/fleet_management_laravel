@extends('/layouts/main')
@push('styles')
<link rel="stylesheet" href="{{asset('/css/vehicles/listing.css')}}" />
@endPush

@section('contents')
{{Form::label('lbl-page-header', 'Vehicles', ['id' => 'lbl-page-header'])}}

@endSection