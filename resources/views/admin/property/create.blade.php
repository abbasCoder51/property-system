@extends('layouts.admin')

@section('title', 'Create Property')

@section('body_content')
    @component('components.breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route('admin.properties.index') }}">Properties</a></li>
        <li class="breadcrumb-item active">Create Property</li>
    @endcomponent

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Property</h1>
    </div>

    @include('partials.results')

    <div class="card shadow">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.properties.store') }}" enctype="multipart/form-data">
                @include('admin.property.form')
            </form>
        </div>
    </div>
@endsection
