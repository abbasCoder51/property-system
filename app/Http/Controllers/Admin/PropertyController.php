<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::query()->paginate(10);

        return view('admin.property.index')
            ->with('properties', $properties);
    }
}
