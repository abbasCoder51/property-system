@extends('layouts.app')

@section('body_content')
    <div class="relative min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            <a href="" class="text-sm text-gray-700 underline">Admin</a>
        </div>

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                <h1>Property API System</h1>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6">
                        <form id="fetch_properties" action="/" method="post" class="form-group">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="page_number">Page Number</label>
                                <input type="text" name="page_number" class="form-control" placeholder="Enter Page Number">
                            </div>
                            <div class="form-group">
                                <label>Page Size</label>
                                <input type="text" name="page_size" class="form-control" placeholder="Enter Page Size">
                            </div>
                            <button type="submit" class="btn btn-info pull-right">Fetch</button>
                        </form>
{{--                        Page Number <input type="text">--}}
{{--                        Page Size <input type="text">--}}
                    </div>
                </div>
            </div>

            <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </div>
            </div>
        </div>
    </div>
@endsection
