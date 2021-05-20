<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $table = 'properties';

    protected $fillable = [
        'uuid',
        'county_id',
        'country_id',
        'town_id',
        'description',
        'full_details_url',
        'displayable_address',
        'image_url',
        'thumbnail_url',
        'latitude',
        'longitude',
        'number_of_bedrooms',
        'number_of_bathrooms',
        'price',
        'property_type_id',
        'contract_type',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s'
    ];
}
