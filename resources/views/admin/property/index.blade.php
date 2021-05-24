@extends('layouts.admin')

@section('title', 'Property')

@section('body_content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Properties</h1>
        <a href="{{ route('admin.properties.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Create Properties</a>
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

                        @component('components.filter')
                            <div class="form-group d-flex">
                                <div class="col-sm-3">
                                    <label for="county" class="control-label">County</label>
                                    <input type="text" id="county" name="county" class="form-control" value="{{ Request::input('county') }}">
                                </div>
                                <div class="col-sm-3">
                                    <label for="country" class="control-label">Country</label>
                                    <input type="text" id="country" name="country" class="form-control" value="{{ Request::input('country') }}">
                                </div>
                                <div class="col-sm-3">
                                    <label for="town" class="control-label">Town</label>
                                    <input type="text" id="town" name="town" class="form-control" value="{{ Request::input('town') }}">
                                </div>
                                <div class="col-sm-3">
                                    <label for="data_source" class="control-label">Data Source</label>
                                    <select name="data_source" id="data_source" class="form-control">
                                        <option value="" {{ Request::get('data_source') == null ? "selected" : "" }}>All</option>
                                        <option value="1" {{ Request::get('data_source') == 1 ? "selected" : "" }}>Api</option>
                                        <option value="0" {{ Request::get('data_source') == 0 && Request::get('data_source') != null ? "selected" : "" }}>Admin</option>
                                    </select>
                                </div>
                            </div>
                        @endcomponent

                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered dataTable" id="dataTable" width="100%"
                                           cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                           style="width: 100%;">
                                        <thead>
                                        <tr role="row">
                                            <th>ID</th>
                                            <th>County</th>
                                            <th>Town</th>
                                            <th>Country</th>
                                            <th>Property Type</th>
                                            <th>Contract Type</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($properties as $index => $property)
                                                <tr>
                                                    <td>{{ $property->id }}
                                                        <span class="text-white badge bg-{{ $property->is_api_data ? "primary" : "secondary" }}">
                                                            {{ $property->is_api_data ? "Api" : "Admin" }}
                                                        </span>
                                                    </td>
                                                    <td>{{ $property->county->name }}</td>
                                                    <td>{{ $property->town->name }}</td>
                                                    <td>{{ $property->country->name }}</td>
                                                    <td>{{ $property->propertyType->title }}</td>
                                                    <td>{{ $property->contract_type }}</td>
                                                    <td>{{ $property->formatPrice }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.properties.show', $property->id) }}"
                                                           class="btn btn-info"><i class="fa fa-eye"></i></a>
                                                        <a href="{{ route('admin.properties.edit', $property->id) }}"
                                                           class="btn btn-warning"><i class="fa fa-pen"></i></a>
                                                        <form action="{{ route('admin.properties.destroy', $property->id) }}" method="POST" class="d-inline">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <button type="submit" class="btn btn-danger">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="8" class="text-center">No Results Found</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-12">
                                    {{ $properties->withQueryString()->links('pagination.default') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
