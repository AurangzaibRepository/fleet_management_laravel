@extends('/layouts/main')
@push('styles')
<link rel="stylesheet" href="{{asset('/css/vendors/details.css')}}" />
@endPush

@section('contents')
{{Form::label('lbl-page-header', 'Vendor Details', ['id' => 'lbl-page-header'])}}
<div class="dv-base">
    <div class="page-layout">

    </div>
</div>
@endSection