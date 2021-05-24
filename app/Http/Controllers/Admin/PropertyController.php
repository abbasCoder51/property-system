<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $properties = Property::query();

        if ($request->get('county')) {
            $properties = $properties->whereHas('county', function($query) use ($request) {
                return $query->where('name', 'LIKE', '%' . $request->get('county') . '%');
            });
        }

        if ($request->get('country')) {
            $properties = $properties->whereHas('country', function($query) use ($request) {
                return $query->where('name', 'LIKE', '%' . $request->get('country') . '%');
            });
        }

        if ($request->get('town')) {
            $properties = $properties->whereHas('town', function($query) use ($request) {
                return $query->where('name', 'LIKE', '%' . $request->get('town') . '%');
            });
        }

        if ($request->has('data_source') && $request->get('data_source') != null) {
            $properties = $properties->where('is_api_data', $request->get('data_source'));
        }

        $properties = $properties->paginate($this->paginateSize);

        return view('admin.property.index')
            ->with('properties', $properties);
    }

    public function show(Property $property)
    {
        return view('admin.property.show')
            ->with('property', $property);
    }

    public function destroy(Property $property)
    {
        $property->delete();

        return redirect()->route('admin.properties.index')
            ->with('success', 'Delete Property - ' . $property->id);
    }
}
