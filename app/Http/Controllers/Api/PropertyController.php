<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Api\Property;

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
}
