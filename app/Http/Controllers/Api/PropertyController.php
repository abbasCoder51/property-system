<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Api\Property as ApiProperty;
use App\Models\Country;
use App\Models\County;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\Town;

class PropertyController extends Controller
{
    private ApiProperty $model;

    public function __construct()
    {
        $this->model = new ApiProperty();
    }

    public function index()
    {
        $response = $this->model->getProperties();

        $propertyModel = new Property();
        $propertyTypeModel = new PropertyType();
        $countyModel = new County();
        $countryModel = new Country();
        $townModel = new Town();

        foreach ($response['data'] as $property) {
            $county = $countyModel->create([
                'name' => $property['county']
            ]);
            $country = $countryModel->create([
                'name' => $property['country']
            ]);
            $town = $townModel->create([
                'name' => $property['town']
            ]);
            $propertyType = $propertyTypeModel->create([
                'id' => $property['property_type']['id'],
                'title' => $property['property_type']['title'],
                'description' => $property['property_type']['description'],
                'created_at' => $property['property_type']['created_at'],
                'updated_at' => $property['property_type']['updated_at']
            ]);
            $propertyModel->create([
                'uuid' => $property['uuid'],
                'county_id' => $county->id,
                'country_id' => $country->id,
                'town_id' => $town->id,
                'description' => $property['description'],
                'full_details_url' => 'fcjcjcj',
                'displayable_address' => $property['address'],
                'image_url' => $property['image_full'],
                'thumbnail_url' => $property['image_thumbnail'],
                'latitude' => $property['latitude'],
                'longitude' => $property['longitude'],
                'number_of_bedrooms' => $property['num_bedrooms'],
                'number_of_bathrooms' => $property['num_bathrooms'],
                'price' => $property['price'],
                'property_type_id' => $propertyType->id,
                'contract_type' => $property['type'],
                'created_at' => $property['created_at'],
                'updated_at' => $property['updated_at']
            ]);
        }

        return $response;
    }
}
