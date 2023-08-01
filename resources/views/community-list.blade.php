@extends('layouts.main')
@push('styles')
<link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
</link>
<link rel="stylesheet" href="{{asset('/css/community-feeds.css')}}">
</link>
@endpush

@section('contents')
{{Form::label('lbl-page-header', 'Community Feeds', ['id' => 'lbl-page-header'])}}

@if (session()->has('success'))
<div class="alert alert-success">{{session()->get('success')}}</div>
@endif

<div class="dv-base">
    <div class="page-layout">

        <table id="table-feeds" class="table table-bordered table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Question</th>
                    <th>User</th>
                    <th>Category</th>
                    <th>Posted Date</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
        </table>

    </div>
</div>

{{-- Approval modal --}}
<div class="modal" id="modal-approval">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <label>Feed Approval</label>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        {{Form::label('categoryid', 'Category')}}
                        {{Form::select('categoryid', $categories, null, ['id' => 'categoryid'])}}
                        <span class="spn-error" id="spn-categoryid">Category required</span>
                    </div>
                    <div class="col-12">
                        {{Form::label('answer', 'Answer')}}
                        {{Form::textarea('answer', null, ['class' => 'form-control', 'id' => 'answer'])}}
                        <span class="spn-error" id="spn-answer">Answer required</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-end btn-col">
                        {{Form::button('Approve',['class' => 'btn btn-primary', 'onClick' => 'approve()'])}}
                        {{Form::button('Cancel', ['class' => 'btn btn-secondary', 'data-bs-dismiss' => 'modal'])}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@push('scripts')
<script src="{{asset('/js/select2.min.js')}}"></script>
<script src="{{asset('/js/community-feeds.js')}}"></script>
@endpush