@extends('layouts/main')
@push('styles')
<link rel="stylesheet" href="{{asset('/css/fuel-histories/listing.css')}}" />
@endPush

@section('contents')
{{Form::label('lbl-page-header', 'Fuel History', ['id' => 'lbl-page-header'])}}

<div class="dv-base">
    <div class="page-layout">
        <table id="table-fuel-history" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Vehicle</th>
                    <th>Date</th>
                    <th>Meter Entry</th>
                    <th>Total</th>
                    <th></th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endSection

@push('scripts')
<script type="text/javascript" src="{{asset('/js/fuel-histories/listing.js')}}"></script>
@endPush