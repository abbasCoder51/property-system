<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        $countries = Country::query();

        if ($request->get('name')) {
            $countries = $countries->where('name', 'LIKE', '%' . $request->get('name') . '%');
        }

        $countries = $countries->paginate($this->paginateSize);

        return view('admin.country.index')
            ->with('countries', $countries);
    }

    public function show(Country $country)
    {
        return view('admin.country.show')
            ->with('country', $country);
    }
}
