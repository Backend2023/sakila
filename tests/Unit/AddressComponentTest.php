<?php
// namespace Tests\Unit;
namespace Tests\Unit\View\Components;

use Tests\TestCase;
use App\Models\Address;
use App\Models\City;
use App\Models\Country;
use App\View\Components\AddressComponent;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AddressComponentTest extends TestCase
{
    use RefreshDatabase;

    public function test_component_renders_correctly_with_valid_address()
    {
        // Create Country, City, and Address using factories
        $country = Country::factory()->create();
        $city = City::factory()->create(['country_id' => $country->country_id]);
        $address = Address::factory()->create(['city_id' => $city->city_id]);

        // Create the component instance
        $component = new AddressComponent($address->address_id);

        // Assert the component properties
        $this->assertEquals($address->address, $component->address);
        $this->assertEquals($city->city, $component->city);
        $this->assertEquals($country->country, $component->country);
    }

     public function test_component_handles_invalid_address()
    {
        // Napravimo komponentu sa invalid address ID
        $invalidAddressId = 999;

        // ukoliko smo sigurni da će exceprtion sprijeciti daljnje asserte
        //$this->expectNotToPerformAssertions();
        
        /**
         * Ne postoji model s ID=999 pa nam DB raw query baca exception
         *          * 
         * 1) Tests\Unit\View\Components\AddressComponentTest::test_component_handles_invalid_address
         * Illuminate\Database\Eloquent\ModelNotFoundException: No query results for model [App\Models\Address] 999
         */
        // Uvjerimo se da ukoliko posaljemo pohresan  ID da će doci do exceptiona
        $this->expectException(\Illuminate\Database\Eloquent\ModelNotFoundException::class);
       
        $component = new AddressComponent($invalidAddressId);
           
            // Ovo dolje se nikada nece izvrsiti zbog exceptiona
                  $this->assertNull($component->address);
                  $this->assertNull($component->city);
                  $this->assertNull($component->country);
        
 

    } 

    public function test_component_view_is_rendered()
    {
        // Create Country, City, and Address using factories
        $country = Country::factory()->create();
        $city = City::factory()->create(['country_id' => $country->country_id]);
        $address = Address::factory()->create(['city_id' => $city->city_id]);

        // Render the component
        $view = (new AddressComponent($address->address_id))->render();

        // Assert the view is returned correctly
        $this->assertEquals('components.address-component', $view->name());
    }

    // Additional tests for edge cases and performance can be added here
}

