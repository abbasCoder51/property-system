@extends('layouts.admin')

@section('title', 'Edit Property- ' . $property->id)

@section('body_content')
    @component('components.breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route('admin.properties.index') }}">Properties</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.properties.show', $property->id) }}">{{ $property->id }}</a></li>
        <li class="breadcrumb-item active">Edit Property</li>
    @endcomponent

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Property</h1>
    </div>

    @include('partials.results')

    <div class="card shadow">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.properties.update', $property->id) }}" enctype="multipart/form-data">
                @method('PUT')
                @include('admin.property.form')
            </form>
        </div>
    </div>
@endsection
