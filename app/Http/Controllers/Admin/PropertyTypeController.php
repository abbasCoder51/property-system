<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class PropertyTypeController extends Controller
{
    public function index(Request $request)
    {
        $propertyTypes = PropertyType::query();

        if ($request->get('title')) {
            $propertyTypes = $propertyTypes->where('title', 'LIKE', '%' . $request->get('title') . '%');
        }

        $propertyTypes = $propertyTypes->paginate($this->paginateSize);

        return view('admin.propertyType.index')
            ->with('propertyTypes', $propertyTypes);
    }

    public function show(PropertyType $propertyType)
    {
        return view('admin.propertyType.show')
            ->with('propertyType', $propertyType);
    }
}
