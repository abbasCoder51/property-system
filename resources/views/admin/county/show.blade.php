@extends('layouts.admin')

@section('title', 'Country - ' . $county->id)

@section('body_content')
    @component('components.breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route('admin.counties.index') }}">Counties</a></li>
        <li class="breadcrumb-item active">{{ $county->id }}</li>
    @endcomponent

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Counties - {{ $county->id }}</h1>
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
                                    <b>ID:</b> {{ $county->id }}<br>
                                    <b>Name:</b> {{ $county->name }}<br>
                                    <b>Created At:</b> {{ $county->created_at }}<br>
                                    <b>Updated At:</b> {{ $county->updated_at }}<br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
