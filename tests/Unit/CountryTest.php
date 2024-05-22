<?php
// tests/Unit/CountryTest.php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Country;
use App\Models\City;
use App\Models\Address;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CountryTest extends TestCase
{
    // ovo zakomentiramo ako ne zelimo da nam nakon testa obrise podatke iz baze
    //use RefreshDatabase;

    public function test_country_model()
    {
        // Kreiramo Country, City i Address koristeci factory()
        $country = Country::factory()->create();
        $city = City::factory()->create(['country_id' => $country->country_id]);
        $address = Address::factory()->create(['city_id' => $city->city_id]);

        // Osnovna provjera podataka u tablici
        $this->assertDatabaseHas('countries', ['country_id' => $country->country_id]);
        $this->assertNotNull($country->country);
        $this->assertIsString($country->country);
        $this->assertNotEmpty($country->country);

        // Test relacija
        $this->assertGreaterThanOrEqual(1, $country->cities->count());
        $this->assertContainsOnlyInstancesOf(City::class, $country->cities);

        // test da country ima više cities
        $this->assertTrue($country->cities->contains($city));
        $this->assertEquals($city->country->country_id, $country->country_id);

        // test da city pripada "belongs to" country
        $this->assertEquals($city->country->country_id, $country->country_id);

        // test da  city ima više "has many" addresses
        $this->assertGreaterThanOrEqual(1, $city->addresses->count());
        $this->assertContainsOnlyInstancesOf(Address::class, $city->addresses);

        // test da model address pripada "belongs to"  city
        $this->assertTrue($city->addresses->contains($address));
        $this->assertEquals($address->city->city_id, $city->city_id);

        // uvjeri se da je zemlja u kojoj je grad u kojij je adresa ista creiranoj zemlji (reverse track) 
        $this->assertEquals($address->city->country->country_id, $country->country_id);
    }
}
