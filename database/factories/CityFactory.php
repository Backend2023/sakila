<?php

namespace Database\Factories;
use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;


//TODO ne radi autoloading
// Class Database\Factories\CityFactory located in 
// C:/xampp/htdocs/lara-sakila/database/factories\CityFactory copy.php 
// does not comply with psr-4 autoloading standard. Skipping.

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\City>
 */
class CityFactory extends Factory
{
    protected $model = City::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'city' => $this->faker->city,
            'country_id' => Country::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
