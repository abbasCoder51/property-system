<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use App\Models\Country;
use App\Models\County;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\Town;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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

    public function edit(Property $property)
    {
        $propertyTypes = PropertyType::query()->get();

        return view('admin.property.edit')
            ->with('property', $property)
            ->with('propertyTypes', $propertyTypes);
    }

    public function update(UpdatePropertyRequest $request, Property $property)
    {
        $data = [
            'county_id' => County::query()
                ->where('name', 'LIKE', '%' . $request->get('county') . '%')
                ->updateOrCreate(['name' => $request->get('county')])->id,
            'country_id' => Country::query()
                ->where('name', 'LIKE', '%' . $request->get('country') . '%')
                ->updateOrCreate(['name' => $request->get('country')])->id,
            'town_id' => Town::query()
                ->where('name', 'LIKE', '%' . $request->get('town') . '%')
                ->updateOrCreate(['name' => $request->get('town')])->id,
            'postcode' => $request->get('postcode'),
            'description' => $request->get('description'),
            'displayable_address' => $request->get('displayable_address'),
            'number_of_bedrooms' => $request->get('number_of_bedrooms'),
            'number_of_bathrooms' => $request->get('number_of_bathrooms'),
            'price' => $request->get('price'),
            'image_url' => $property->image_url,
            'thumbnail_url' => $property->thumbnail_url,
            'property_type_id' => PropertyType::query()
                ->where('title', 'LIKE', '%' . $request->get('property_type') . '%')
                ->updateOrCreate(['title' => $request->get('property_type')])->id,
            'contract_type' => $request->get('contract_type')
        ];

        $imageUploadRequest = $request->file('image_upload');
        if($imageUploadRequest) {
            $ImageUrlPath = $imageUploadRequest->storeAs(
                'images/full',
                time() . '.' . $imageUploadRequest->extension(),
                'public_folder'
            );

            $data['image_url'] = $ImageUrlPath;

            $ThumbnailUrlPath = $imageUploadRequest->storeAs(
                'images/thumbnail',
                time() . '.' . $imageUploadRequest->extension(),
                'public_folder'
            );

            $img = Image::make($ThumbnailUrlPath);
            $img->resize(110, 110, function ($const) {
                $const->aspectRatio();
            })->save($ThumbnailUrlPath);

            $data['thumbnail_url'] = $ThumbnailUrlPath;

            // Delete property full and thumbnail image
            Storage::disk('public_folder')->delete($property->image_url);
            Storage::disk('public_folder')->delete($property->thumbnail_url);
        }

        $property->update($data);

        $property = Property::query()->create($data);

        return redirect()->route('admin.properties.index')
            ->with(['success' => 'Updated Property - ' . $property->id]);
    }

    public function create()
    {
        $propertyTypes = PropertyType::query()->get();

        return view('admin.property.create')
            ->with('propertyTypes', $propertyTypes);
    }

    public function store(CreatePropertyRequest $request)
    {
        $data = [
            'county_id' => County::query()
                ->where('name', 'LIKE', '%' . $request->get('county') . '%')
                ->updateOrCreate(['name' => $request->get('county')])->id,
            'country_id' => Country::query()
                ->where('name', 'LIKE', '%' . $request->get('country') . '%')
                ->updateOrCreate(['name' => $request->get('country')])->id,
            'town_id' => Town::query()
                ->where('name', 'LIKE', '%' . $request->get('town') . '%')
                ->updateOrCreate(['name' => $request->get('town')])->id,
            'postcode' => $request->get('postcode'),
            'description' => $request->get('description'),
            'displayable_address' => $request->get('displayable_address'),
            'number_of_bedrooms' => $request->get('number_of_bedrooms'),
            'number_of_bathrooms' => $request->get('number_of_bathrooms'),
            'price' => $request->get('price'),
            'property_type_id' => PropertyType::query()
                ->where('title', 'LIKE', '%' . $request->get('property_type') . '%')
                ->updateOrCreate(['title' => $request->get('property_type')])->id,
            'contract_type' => $request->get('contract_type'),
            'created_at' => date('Y-m-d H:i:s')
        ];

        $imageUploadRequest = $request->file('image_upload');
        if($imageUploadRequest) {
            $ImageUrlPath = $imageUploadRequest->storeAs(
                'images/full',
                time() . '.' . $imageUploadRequest->extension(),
                'public_folder'
            );

            $data['image_url'] = $ImageUrlPath;

            $ThumbnailUrlPath = $imageUploadRequest->storeAs(
                'images/thumbnail',
                time() . '.' . $imageUploadRequest->extension(),
                'public_folder'
            );

            $img = Image::make($ThumbnailUrlPath);
            $img->resize(110, 110, function ($const) {
                $const->aspectRatio();
            })->save($ThumbnailUrlPath);

            $data['thumbnail_url'] = $ThumbnailUrlPath;
        }

        $property = Property::query()->create($data);

        return redirect()->route('admin.properties.index')
            ->with(['success' => 'Created Property - ' . $property->id]);
    }

    public function destroy(Property $property)
    {
        $property->delete();

        return redirect()->route('admin.properties.index')
            ->with('success', 'Delete Property - ' . $property->id);
    }
}
