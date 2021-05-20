<?php

namespace Database\Factories;

use App\Models\Country;
use App\Models\County;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\Town;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Property::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'uuid' => $this->faker->uuid,
            'county_id' => County::factory()->create()->id,
            'country_id' => Country::factory()->create()->id,
            'town_id' => Town::factory()->create()->id,
            'description' => $this->faker->paragraph,
            'full_details_url' => $this->faker->url,
            'displayable_address' => $this->faker->address,
            'image_url' => $this->faker->imageUrl(),
            'thumbnail_url' => $this->faker->imageUrl(),
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'number_of_bedrooms' => $this->faker->numberBetween(1, 5),
            'number_of_bathrooms' => $this->faker->numberBetween(1,3),
            'price' => $this->faker->numberBetween(90000, 30000),
            'property_type_id' => PropertyType::factory()->create()->id,
            'contract_type' => ['rent', 'sale'][$this->faker->numberBetween(0,1)],
            'created_at' => $this->faker->dateTime,
            'updated_at' => $this->faker->dateTime
        ];
    }
}
