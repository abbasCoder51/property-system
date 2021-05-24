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
        'is_api_data',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s'
    ];

    public function county()
    {
        return $this->belongsTo(County::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function town()
    {
        return $this->belongsTo(Town::class);
    }

    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class, 'property_type_id');
    }

    public function getFormatPriceAttribute()
    {
        return "$" . number_format($this->price, 0, '', ',');
    }
}
