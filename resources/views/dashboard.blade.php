@extends('/layouts/main')
<!-- Styles-->
@push('styles')
<link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
</link>
@endpush

@section('contents')
{{Form::label('lbl-page-header', 'Analytics', ['id' => 'lbl-page-header'])}}

<div class="row dv-base">
</div>
@endSection


<!-- Scripts -->
@push('scripts')
<script src=" {{asset('js/highcharts.js')}}"></script>
<script src="{{asset('js/dashboard.js')}}"></script>
@endpush