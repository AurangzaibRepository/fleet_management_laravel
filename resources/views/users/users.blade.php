@extends('layouts.main')
<!-- Style -->
@push('styles')
<link rel="stylesheet" href="{{asset('css/users.css')}}">
</link>
<link rel="stylesheet" href="{{asset('css/daterangepicker.css')}}" />
@endpush

@section('contents')
{{Form::label('lbl-page-header', 'Manage Users', ['id' => 'lbl-page-header'])}}

@if (session()->has('success'))
<div class="alert alert-success">{{session()->get('success')}}</div>
@endif

<div class="dv-base">
    <div class="page-layout">

        {{-- Filter --}}
        @include('users.filters')

        <table id="table-users" class="tbl-users table table-striped table-bordered" style="width: 100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>UserID</th>
                    <th>Android Version</th>
                    <th>Last Activity</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
        </table>
    </div>
</div>

{{-- User detail modal --}}
@include('users.modal-user')

@endsection

<!-- Script -->
@push('scripts')
<script src="{{URL::asset('js/moment.js')}}"></script>
<script src="{{URL::asset('js/daterangepicker.min.js')}}"></script>
<script src="{{asset('js/users.js')}}"></script>
@endpush