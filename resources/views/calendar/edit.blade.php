@extends('layouts.main')
@section('contents')

@push('styles')
<link rel="stylesheet" href="{{asset('css/daterangepicker.css')}}" />
<link rel="stylesheet" href="{{asset('css/select2.min.css')}}" />
<link rel="stylesheet" href="{{asset('css/calendar-add.css')}}" />
<link rel="stylesheet" href="{{asset('css/calendar-edit.css')}}" />
@endpush

{{Form::label('lbl-page-header', $pageTitle, ['id' => 'lbl-page-header'])}}

@include('calendar.messages')

<div class="dv-base">
    <div class="page-layout">
        @include('calendar.edit-form')
    </div>
</div>

@endsection

@push('scripts')
<script src="{{asset('js/moment.js')}}"></script>
<script src="{{asset('js/daterangepicker.min.js')}}"></script>
<script src="{{asset('js/select2.min.js')}}"></script>
<script src="{{asset('js/calendar-add.js')}}"></script>
<script src="{{asset('js/calendar-edit.js')}}"></script>
<script src="{{asset('js/calendar-validate.js')}}"></script>
@endpush