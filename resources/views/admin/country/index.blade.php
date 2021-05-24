@extends('layouts.admin')

@section('title', 'Country')

@section('body_content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Countries</h1>
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
                                    <label for="name" class="control-label">Name</label>
                                    <input type="text" id="name" name="name" class="form-control" value="{{ Request::input('name') }}">
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
                                            <th>name</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($countries as $country)
                                            <tr>
                                                <td>{{ $country->id }}</td>
                                                <td>{{ $country->name }}</td>
                                                <td>{{ $country->created_at }}</td>
                                                <td>{{ $country->updated_at }}</td>
                                                <td>
                                                    <a href="{{ route('admin.countries.show', $country->id) }}"
                                                       class="btn btn-info"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">No Results Found</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-12">
                                    {{ $countries->withQueryString()->links('pagination.default') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
