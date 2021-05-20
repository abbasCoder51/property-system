<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Api\Property;
use App\Models\County;

class PropertyController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new Property();
    }

    public function index()
    {
        return $this->model->getProperties();
    }

    public function update()
    {
        $properties = $this->model->getProperties();
        $propertyModel = new \App\Models\Property();
        $countyModel = new County();

        foreach($properties['data'] as $property) {
            if (!$propertyModel->where('uuid', $property['uuid'])->exists()) {
                $county_id = $countyModel->create([
                    'name' => $property['county']
                ]);
            }
        }
    }
}
