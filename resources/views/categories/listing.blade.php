@extends('layouts.main')

<!-- Style -->
@push('styles')
<link rel="stylesheet" href="{{asset('css/categories-listing.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('css/slick.min.css')}}" />
@endpush

@section('contents')
<div>
    {{Form::label('lbl-page-header', 'Topics', ['id' => 'lbl-page-header'])}}
    <a id="btn-add-topic" data-bs-toggle="modal" data-bs-target="#modal-category">
        <i class="fa fa-plus"></i>
        Add new topic
    </a>
</div>
<br />

@if (session()->has('success'))
<div class="alert alert-success">{{session()->get('success')}}</div>
@endif

<!-- Active topics -->
<label class="lbl-topic">Active Topics:</label>

<div class="page-layout dv-topics">
    <section class="logo-topics slider" data-arrows="true">

        @foreach ($activeCategories as $category)
        <div class="slide">
            <a class="lnk-topic" href="{{route('editCategory', [$category->id])}}">
                <div>
                    <img src="{{url('images/leaf-icon.png')}}"></img>
                </div>
                <span>{{$category->category}}</span>
            </a>
        </div>
        @endforeach
    </section>
</div>

<br />
<!-- Inactive topics -->
<label class="lbl-topic">Inactive Topics:</label>

<div class="page-layout dv-topics" id="dv-inactive-topics">
    <section class="logo-topics slider" data-arrows="true">

        @foreach ($inactiveCategories as $category)
        <div class="slide">
            <a class="lnk-topic" href="{{route('editCategory', [$category->id])}}">
                <div>
                    <img src="{{url('images/leaf-icon.png')}}"></img>
                </div>
                <span>{{$category->category}}</span>
            </a>
        </div>
        @endforeach
    </section>
</div>

@include('categories.add-category')

@endsection

<!-- Scripts -->
@push('scripts')
<script src="{{asset('js/slick.min.js')}}"></script>
<script src="{{asset('js/categories-listing.js')}}"></script>
@endpush