@extends('/layouts/main')
@push('styles')
<link rel="stylesheet" href="{{asset('/css/vendors/listing.css')}}"></link>
@endPush

@section('contents')
{{Form::label('lbl-page-header', 'Vendors', ['id' => 'lbl-page-header'])}}
<div class="dv-base">
    <div class="page-layout">
        <table id="table-vendors" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Contact Number</th>
                    <th>Website</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endSection

@push('scripts')
<script src="{{asset('/js/vendors/listing.js')}}" />
@endPush