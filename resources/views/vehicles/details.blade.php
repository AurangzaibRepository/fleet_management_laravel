@extends('layouts/main')
@push('styles')
<link rel="stylesheet" href="{{asset('/css/vehicles/listing.css')}}" />
<link rel="stylesheet" href="{{asset('/css/vehicles/details.css')}}" />
@endPush

@section('contents')
{{Form::label('lbl-page-header', 'Vehicle Details', ['id' => 'lbl-page-header'])}}
<div class="dv-base">
    @include('vehicles.details-form')
</div>
@endSection