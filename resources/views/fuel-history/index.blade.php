@extends('layouts/main')
@push('styles')
<link rel="stylesheet" href="{{asset('/css/fuel-histories/listing.css')}}" />
@endPush

@section('contents')
{{Form::label('lbl-page-header', 'Fuel History', ['id' => 'lbl-page-header'])}}

<div class="dv-base">
    <div class="page-layout">

    </div>
</div>
@endSection