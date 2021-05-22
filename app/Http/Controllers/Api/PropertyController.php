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

        foreach ($response['data'] as $property) {

            $county = $this->populateCountyRecord($property['county']);
            $country = $this->populateCountryRecord($property['country']);
            $town = $this->populateTownRecord($property['town']);
            $propertyType = $this->populatePropertyTypeRecord($property['property_type']);

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
                'is_api_data' => 1,
                'created_at' => $property['created_at'],
                'updated_at' => $property['updated_at']
            ]);
        }

        return $response;
    }

    /**
     * @param $name
     */
    private function populateCountyRecord($name)
    {
        return County::query()->where('name', $name)->updateOrCreate([
            'name' => $name,
            'is_api_data' => 1
        ]);
    }

    /**
     * @param $name
     */
    private function populateCountryRecord($name)
    {
        return Country::query()->where('name', $name)->updateOrCreate([
            'name' => $name,
            'is_api_data' => 1
        ]);
    }

    /**
     * @param $name
     */
    private function populateTownRecord($name)
    {
        return Town::query()->where('name', $name)->updateOrCreate([
            'name' => $name,
            'is_api_data' => 1
        ]);
    }

    /**
     * @param $propertyType
     */
    private function populatePropertyTypeRecord($propertyType)
    {
        return PropertyType::query()->where('id', $propertyType['id'])->updateOrCreate([
            'id' => $propertyType['id'],
            'title' => $propertyType['title'],
            'description' => $propertyType['description'],
            'is_api_data' => 1,
            'created_at' => $propertyType['created_at'],
            'updated_at' => $propertyType['updated_at']
        ]);
    }
}
