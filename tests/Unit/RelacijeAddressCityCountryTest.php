<?php

namespace Tests\Unit;

use Tests\TestCase; // This TestCase supplied by laravel extends the \PHPUnit\Framework\TestCase and starts Laravel properly
use App\Models\City;
use App\Models\Country;
use App\Models\Address;

class RelacijeAddressCityCountryTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_city_relacija_country(): void
    {
        //  City::find(567)->country()->get()->first()->country;
       //= "Argentina"
       $this->assertEquals("Argentina",City::find(567)->country()->get()->first()->country,"Grad 567 je u Argentini");
    }
    public function test_adresa_relacija_HasOneThrough_country(): void
    {
        // > Address::where('district','Buenos Aires')->first()->zemlja()->first()
        // = App\Models\Country {#6686
        //     country_id: 6,
        //     country: "Argentina",
        //     created_at: "2024-05-08 18:33:20",
        //     updated_at: "2024-05-08 18:33:20",
        //     laravel_through_key: 289,
        //   }
        
       $this->assertEquals("Argentina"
       , Address::where('district','Buenos Aires')->first()->zemlja()->first()->country
       , "Grad 567 je u Argentini");

       $this->assertEquals("Argentina"
       , Address::where('district','Buenos Aires')->get()->first()
       ->city()->get()->first()
       ->country()->get()->first()->country  // koristimo country() iz modela City
       , "Grad 567 je u Argentini");      
       
       $this->assertEquals("Argentina"
       , Address::where('district','Buenos Aires')->get()->first()
       ->city()->get()->first()
       ->mojazemlja()->get()->first()->country  // koristimo mojazemlja() iz modela City
       , "Grad 567 je u Argentini");  
    }
}
