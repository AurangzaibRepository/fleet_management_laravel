@extends('layouts.main')
@section('contents')

@push('styles')
<link rel="stylesheet" href="{{asset('css/category-edit.css')}}" />
@endpush

{{Form::label('lbl-page-header', $pageTitle, ['id' => 'lbl-page-header'])}}

@if (session()->has('success'))
<div class="alert alert-success">{{session()->get('success')}}</div>
@endif

<div class="page-layout">
    <div id="dv-category">
        {{Form::open(['route' => 'updateCategory'])}}
        <div class="row">
            <div class="col-4">
                <div class="mb-3">
                    {{Form::hidden('id', $data->id)}}
                    {{Form::label('category', 'Category')}}
                    {{Form::text('category', $data->category, ['class' => 'form-control'])}}
                    <span class="spn-error" id="error-category">Category required</span>
                </div>
            </div>
            <div class="col-4">
                <div class="mb-3">
                    {{Form::label('status', 'Status')}}
                    {{Form::select('status', $statusArray, $data->status, ['class' => 'form-select'])}}
                    <span class="spn-error" id="error-category-status">Status required</span>
                </div>
            </div>
            <div class="col-4 dv-checkbox" id="dv-publish">
                {{Form::checkbox('published', 1, $data->published)}}
                {{Form::label('published', 'Publish')}}
            </div>
            <div class="col-12 text-end">
                {{Form::submit('Save', ['class' => 'btn btn-primary', 'onClick' => 'return validateCategory()'])}}
                {{link_to('topics', 'Back', ['class' => 'btn btn-secondary'] )}}
            </div>
        </div>
        {{Form::close()}}
    </div>

    <br />
    <div id="dv-header-label">
        <label>Subcategories</label>
    </div>
    <div class="text-end">
        {{Form::button('Add New', ['class' => 'btn btn-primary', 'data-bs-toggle' => 'modal',
        'data-bs-target' => '#modal-subcategory'])}}
    </div>

    <table id="tbl-subcategories" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Subcategory</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
    </table>
</div>

@include('categories.add-subcategory')

@endsection

@push('scripts')
<script src="{{url('js/category-edit.js')}}"></script>
@endpush