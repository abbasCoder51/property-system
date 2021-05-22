<?php

namespace Database\Factories;

use App\Models\PropertyType;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PropertyType::class;

    /**
     * @var array $propertyTypes
     */
    private $propertyTypes = [
        'Purpose Built Flat',
        'Converted Flat',
        'Studio Flat',
        'Maisonettes',
        'Bungalow',
        'Cottage',
        'Terrace House',
        'Detached House',
        'Detached House',
        'Semi-detached House',
        'End-of-terrace',
        'Mansion'
    ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->propertyTypes[$this->faker->numberBetween(0, count($this->propertyTypes) - 1)],
            'description' => $this->faker->paragraph,
            'is_api_data' => 0,
            'created_at' => $this->faker->dateTime,
            'updated_at' => $this->faker->dateTime
        ];
    }
}
