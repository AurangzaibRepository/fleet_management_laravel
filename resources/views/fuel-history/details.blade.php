@extends('layouts/main')

@section('contents')
{{Form::label('lbl-page-header', 'Fuel Details', ['id' => 'lbl-page-header'])}}
<div class="dv-base">
@include('fuel-history.details-form')
</div>
@endSection