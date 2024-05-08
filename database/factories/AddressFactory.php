<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

// > $adrs = Address::factory()->count(3)->make();   // kreira samo objekt modela
// > $adrs = Address::factory()->count(3)->create(); // kreira objekt po modelu i sprema ga u bazu

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\City>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           // `address_id` SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
            // `address` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_unicode_ci',
            'address' => Str::substr(fake()->address(),1,49),
            // `address2` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
            'address2' => Str::substr(fake()->address(),0,49),
            // `district` VARCHAR(20) NOT NULL COLLATE 'utf8mb4_unicode_ci',
            'district'=>Str::substr(fake()->streetAddress(),1,15),
            // `city_id` SMALLINT(5) UNSIGNED NOT NULL,
            'city_id'=>(new City)->inRandomOrder()->first()->city_id,
            // `postal_code` VARCHAR(10) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
            'postal_code'=>fake()->postcode(),
            // `phone` VARCHAR(20) NOT NULL COLLATE 'utf8mb4_unicode_ci',
            'phone'=>fake()->phoneNumber(),
            // `created_at` TIMESTAMP NULL DEFAULT NULL,
            'created_at'=>now()
            // `updated_at` TIMESTAMP NULL DEFAULT NULL,
        ];
    }
}
