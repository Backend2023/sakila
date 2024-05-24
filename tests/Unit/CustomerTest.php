<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\City;
use App\Models\Country;
use App\Models\Address;
use App\Models\Customer;

class CustomerTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }
    
    /**
     * Test relacija Customer
     */
    public function test_customer_model()
    {
        // kreiraj Country, City, i Address koristeći factory()
        $country = Country::factory()->create();
        $city = City::factory()->create(['country_id' => $country->country_id]);
        $address = Address::factory()->create(['city_id' => $city->city_id]);
        $customer = Customer::factory()->create(['address_id' => $address->address_id]);

        $this->assertDatabaseHas('customers', ['customer_id' => $customer->customer_id]);
        $this->assertNotNull($customer->first_name);
        $this->assertNotNull($customer->last_name);
        $this->assertEquals($customer->address_id, $address->address_id);
        $this->assertNotNull($customer->email);
        $this->assertNotNull($customer->active);

        $this->assertEquals($customer->address->city->city_id, $city->city_id);
        $this->assertEquals($customer->address->city->country->country_id, $country->country_id);
        $this->assertEquals($customer->address->city->mojazemlja->country_id, $country->country_id);   
        $this->assertInstanceOf(City::class, $customer->address->city);
        $this->assertInstanceOf(Country::class, $customer->address->city->country);
        $this->assertInstanceOf(Address::class, $address);

        // ovo pada je u customer ne postoji BelongsTo relacija na adresa
        // odonosno u modelu Customer ne postoji metoda address()
        $this->assertInstanceOf(Address::class, $customer->address); 

    }
}
