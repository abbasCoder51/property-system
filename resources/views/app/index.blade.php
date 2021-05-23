@extends('layouts.app')

@section('body_content')
    <div class="container mt-5">
        <div class="row">
            <h1>Property API System</h1>
        </div>
        <form id="fetch_properties_form"  class="row mt-3 mb-3">
            <div class="row">
                <div class="col-4">
                    <label class="w-100">
                        <input type="text" name="page[number]" class="form-control" placeholder="Enter Page Number (default 1)">
                    </label>
                </div>
                <div class="col-4">
                    <label class="w-100">
                        <input type="text" name="page[size]" class="form-control" placeholder="Enter Page Size (default 30)">
                    </label>
                </div>
                <div class="col-2">
                    <button id="fetch_button" type="submit" class="btn btn-primary">Fetch</button>
                </div>
            </div>
        </form>
    </div>
    <div class="container">
        <div id="api_fetched_data_message" class="hidden alert alert-success"></div>
    </div>
    <div class="container mt-3">
        <div class="row">
            <div class="table-responsive">
                <table id="api_fetched_data_table" class="table">
                    <thead>
                        <tr>
                            <th scope="col">#UUID</th>
                            <th scope="col">Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center no-data-message">
                            <td colspan="2">No Data Retrieved</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
