<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;  // ovo je samo za bazne phpunit testove
use Tests\TestCase; // This TestCase supplied by laravel extends the \PHPUnit\Framework\TestCase and starts Laravel properly
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\City;
use App\Models\Country;
use App\Models\Address;


class AddressTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_select_city_db(): void
    {
        $u1=DB::select('SELECT * FROM cities WHERE city = ?', ['A Coruña (La Coruña)']);

        // = [
        //     {#6643
        //       +"city_id": 1,
        //       +"city": "A Coruña (La Coruña)",
        //       +"country_id": 87,
        //       +"created_at": "2024-05-08 18:33:20",
        //       +"updated_at": null,
        //     },
        //   ]
        //$u1[0]->country_id = 87
        
        $this->assertEquals(87,$u1[0]->country_id,"Grad La Coruna mora biti bazi pod ID 87");
        $this->assertTrue($u1[0]->country_id == 87);

    }
        public function test_select_all_city_eloquent(): void
    {
       $c1= (new City)->all()->first()->get();

        $u1=DB::select('SELECT * FROM cities WHERE city = ?', ['A Coruña (La Coruña)']);

        // = [
        //     {#6643
        //       +"city_id": 1,
        //       +"city": "A Coruña (La Coruña)",
        //       +"country_id": 87,
        //       +"created_at": "2024-05-08 18:33:20",
        //       +"updated_at": null,
        //     },
        //   ]
        //$u1[0]->country_id = 87
        
        $this->assertEquals(87,$u1[0]->country_id,"Grad La Coruna mora biti bazi pod ID 87");
        $this->assertTrue($u1[0]->country_id == 87);

    }
        public function test_single_country_eloquent(): void
    {
        $address2 = Address::with('city.country')->findOrFail(7);
        $drzava = Country::find(6);
        // > $drzava = Country::find(6);
        // = App\Models\Country {#7886
        //     country_id: 6,
        //     country: "Argentina",
        //     created_at: "2024-05-08 18:33:20",
        //     updated_at: "2024-05-08 18:33:20",
        //   }
        
        $this->assertEquals("Argentina",$drzava->country,"Drzava pod ID 6 je Argentina");
        $this->assertNotEquals("Brazil",$drzava->country,"Drzava pod ID 6 ne smije biti Brazil");
    }
            public function test_all_cities_from_country_6_eloquent(): void
    {
        // dohvati mi sve gradove koji se nalaze u Country pod ID=6
        $gradovi = Country::find(6)->cities()->get();
        // = Illuminate\Database\Eloquent\Collection {#6648
        //     all: [
        //       App\Models\City {#6650
        //         city_id: 20,
        //         city: "Almirante Brown",
        //         country_id: 6,
        //         created_at: "2024-05-08 18:33:20",
        //         updated_at: null,
        //       },
        //       App\Models\City {#6651
        //         city_id: 43,
        //         city: "Avellaneda",
        //         country_id: 6,
        //         created_at: "2024-05-08 18:33:20",
        //         updated_at: null,
        //       ...
        
        // $gradovi = Country::find(6)->cities()->get()->count();
        // = 13
       

        
        $this->assertEquals("Almirante Brown",$gradovi[0]->city,"u drzavi Id=6, prvi grad mora biti Almirante Brown");
        $this->assertEquals( 13 , count($gradovi), "u drzavi Id=6, treba biti 13 gradova");

    }
     public function test_single_address_eloquent(): void
    {
        $adr = Address::find(6);
        // = App\Models\Address {#6654
        //     address_id: 6,
        //     address: "1121 Loja Avenue",
        //     address2: "",
        //     district: "California",
        //     city_id: 449,
        //     postal_code: "17886",
        //     phone: "838635286649",
        //     created_at: "2024-05-08 18:33:20",
        //     updated_at: null,
        //   }
        
        
        $this->assertEquals('California',$adr->district,"Adresa sa ID =6 je u državi California");

    }
    public function test_address_city_county_DB(): void
    {
        // > $addressId=7
        // = 7
        
        // > $addressInfo = DB::table('addresses')->select('address', 'city', 'country')->join('cities', 'addresses.city_id', '=', 'cities.city_id'
        // )->join('countries', 'cities.country_id', '=', 'countries.country_id')->where('addresses.address_id', $addressId)->first();
        // = {#6671
        //     +"address": "692 Joliet Street",
        //     +"city": "Athenai",
        //     +"country": "Greece",
        //   }
    $addressId=7;

    $addressInfo = DB::table('addresses')
    ->select('address', 'city', 'country')
    ->join('cities', 'addresses.city_id', '=', 'cities.city_id')
    ->join('countries', 'cities.country_id', '=', 'countries.country_id')
    ->where('addresses.address_id', $addressId)
    ->first();
   

        $this->assertEquals("692 Joliet Street",$addressInfo->address,"Adresa s ID =7 je '692 Joliet Street'");
        $this->assertEquals("Athenai",$addressInfo->city,"Grad je Atena");
        $this->assertEquals("Greece",$addressInfo->country,"zemlja je Greece");

    } 
    public function test_address_city_county_eloquent(): void
    {
//         > $address2 = Address::with('city.country')->findOrFail($addressId);
// [!] Aliasing 'Address' to 'App\Models\Address' for this Tinker session.
// = App\Models\Address {#6615
//     address_id: 7,
//     address: "692 Joliet Street",
//     address2: "",
//     district: "Attika",
//     city_id: 38,
//     postal_code: "83579",
//     phone: "448477190408",
//     created_at: "2024-05-08 18:33:20",
//     updated_at: null,
//     city: App\Models\City {#6624
//       city_id: 38,
//       city: "Athenai",
//       country_id: 39,
//       created_at: "2024-05-08 18:33:20",
//       updated_at: null,
//       country: App\Models\Country {#6631
//         country_id: 39,
//         country: "Greece",
//         created_at: "2024-05-08 18:33:20",
//         updated_at: "2024-05-08 18:33:20",
//       },
//     },
//   }
$addressId=7;
$address2 = Address::with('city.country')->findOrFail($addressId);

$this->assertEquals("692 Joliet Street",$address2->address,"Adresa s ID =7 je '692 Joliet Street'");
$this->assertEquals("Athenai"       ,$address2->city->city,"Grad je Atena");
$this->assertEquals("Greece"        ,$address2->city->country->country,"zemlja je Greece");

    } 

}
