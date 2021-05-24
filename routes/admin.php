<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "web" middleware group.
|
*/

Route::get('/', function () {
    return redirect('admin/properties');
});
Route::resource('properties', 'PropertyController');
Route::resource('countries', 'CountryController')->only(['index', 'show']);
Route::resource('counties', 'CountyController')->only(['index', 'show']);
Route::resource('property-types', 'PropertyTypeController')->only(['index', 'show']);
Route::resource('towns', 'TownController')->only(['index', 'show']);
