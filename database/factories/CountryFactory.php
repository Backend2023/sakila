<?php

namespace Database\Factories;
use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Country>
 */
class CountryFactory extends Factory
{
    protected $model = Country::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //'country' => $this->faker->country,  // ovo generira predugačko ime
            'country' => substr($this->faker->country, 0, 50),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
