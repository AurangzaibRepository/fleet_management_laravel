@extends('/layouts/main')

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