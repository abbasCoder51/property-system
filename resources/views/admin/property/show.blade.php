@extends('layouts.admin')

@section('title', 'Property - ' . $property->id)

@section('body_content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Properties - {{ $property->id }}</h1>
        <div>
            <a href="{{ route('admin.properties.edit', $property->id) }}"
               class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">
                <i class="fas fa-eye fa-sm text-white-50"></i> Edit Property</a>
            <form action="{{ route('admin.properties.destroy', $property->id) }}" method="POST" class="d-sm-inline-block">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                    <i class="fas fa-trash fa-sm text-white-50"></i> Delete Property
                </button>
            </form>
        </div>
    </div>

    @include('partials.results')

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Overview</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <b>ID:</b> {{ $property->id }}<br>
                                    <b>UUID:</b> {{ $property->uuid }}<br>
                                    <b>County:</b> {{ $property->county->name }}<br>
                                    <b>Country:</b> {{ $property->country->name }}<br>
                                    <b>Town:</b> {{ $property->town->name }}<br>
                                    <b>Description:</b> {{ $property->description }}<br>
                                    <b>Full Details URL:</b> {{ $property->full_details_url }}<br>
                                    <b>Displayable Address:</b> {{ $property->displayable_address }}<br>
                                    <b>Image Url:</b> {{ $property->image_url }}<br>
                                    <b>Thumbnail Url:</b> {{ $property->thumbnail_url }}<br>
                                    <b>Longitude:</b> {{ $property->longitude }}<br>
                                    <b>Latitude:</b> {{ $property->latitude }}<br>
                                    <b>Number of bedrooms:</b> {{ $property->number_of_bedrooms }}<br>
                                    <b>Number of bathrooms:</b> {{ $property->number_of_bathrooms }}<br>
                                    <b>Price:</b> {{ $property->price }}<br>
                                    <b>Property Type:</b> {{ $property->propertyType->title }}<br>
                                    <b>Contract Type:</b> {{ $property->contract_type }}<br>
                                    <b>Data Source:</b> {{ $property->is_api_data ? 'Api' : 'Admin' }}<br>
                                    <b>Created At:</b> {{ $property->created_at }}<br>
                                    <b>Updated At:</b> {{ $property->updated_at }}<br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
