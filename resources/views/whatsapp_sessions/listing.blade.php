@extends('layouts.main')
@push('styles')
<link rel="stylesheet" href="{{asset('css/whatsapp-sessions.css')}}">
</link>
@endpush

@section('contents')
{{Form::label('lbl-whatsapp-sessions', 'WhatsApp Sessions', ['id' => 'lbl-page-header'])}}

<div class="dv-base">
    <div class="page-layout">

        @include('whatsapp_sessions.filters')
        <table id="table-whatsapp" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Country</th>
                    <th>Phone Number</th>
                    <th></th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@endsection

@push('scripts')
<script src="{{url('js/whatsapp-sessions.js')}}"></script>
@endpush