<?php
// tests/Unit/CityTest.php

namespace Tests\Unit;

use Tests\TestCase; // This TestCase supplied by laravel extends the \PHPUnit\Framework\TestCase and starts Laravel properly

use App\Models\City;
use App\Models\Country;
use App\Models\Address;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CityTest extends TestCase
{
    //use RefreshDatabase;

    public function test_city_model()
    {
        // Create a Country and City using factories
        $country = Country::factory()->create();
        $city = City::factory()->create(['country_id' => $country->country_id]);
        $address = Address::factory()->create(['city_id' => $city->city_id]);

        // Basic assertions
        $this->assertDatabaseHas('cities', ['city_id' => $city->city_id]);
        $this->assertNotNull($city->city);
        $this->assertNotNull($city->country_id);
        $this->assertEquals($city->country_id, $country->country_id);

        // Relationship assertions
        $this->assertInstanceOf(Country::class, $city->country);
        $this->assertEquals($city->country->country_id, $country->country_id);

        // Verify city belongs to a country
        $this->assertTrue($country->cities->contains($city));

        // Verify city has many addresses
        $this->assertGreaterThanOrEqual(1, $city->addresses->count());
        $this->assertContainsOnlyInstancesOf(Address::class, $city->addresses);

        // Verify address belongs to a city
        $this->assertTrue($city->addresses->contains($address));
        $this->assertEquals($address->city->city_id, $city->city_id);

        // Verify country has many cities
        $this->assertGreaterThanOrEqual(1, $country->cities->count());
        $this->assertContainsOnlyInstancesOf(City::class, $country->cities);
    }
}
