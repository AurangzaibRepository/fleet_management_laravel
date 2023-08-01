@extends('layouts.main')
@section('contents')

@push('styles')
<link rel="stylesheet" href="{{asset('css/calendar.css')}}">
</link>
@endpush

{{Form::label('lbl-page-header', $pageTitle, ['id' => 'lbl-page-header'])}}

@if (session()->has('success'))
<div class="alert alert-success">{{session()->get('success')}}</div>
@endif

{{Form::open()}}
<div class="row">
    <div class="d-flex justify-content-end">
        {{link_to_route('addCalendar', 'Add New', null, ['class' => 'btn btn-primary'])}}
    </div>
</div>
{{Form::close()}}

<div class="dv-base">
    <div class="page-layout">

        <table id="table-reminders" style="width: 100%" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Reminder</th>
                    <th>Place</th>
                    <th>Datetime</th>
                    <th>User</th>
                    <th></th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<!-- Scripts -->
@push('scripts')
<script src="{{asset('js/calendar.js')}}"></script>
@endpush

@endsection