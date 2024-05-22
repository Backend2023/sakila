<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Address;

class AddressComponent extends Component
{
    public $address;
    public $city;
    public $country;

    public $address_id;

    public $address2;
    public $city2;
    public $country2;
    public $address_id2;
    /**
     * Create a new component instance.
     */
    public function __construct($addressId)
    {
        $addressInfo = DB::table('addresses')
        ->select('address', 'city', 'country', 'address_id')
        ->join('cities', 'addresses.city_id', '=', 'cities.city_id')
        ->join('countries', 'cities.country_id', '=', 'countries.country_id')
        ->where('addresses.address_id', $addressId)
        ->first();

        

       // dd($addressId);
      //  dd($addressInfo);
      if ($addressInfo) {
        $this->address = $addressInfo->address;
        $this->city = $addressInfo->city;
        $this->country = $addressInfo->country;
        $this->address_id = $addressInfo->address_id; 
    } else {
        // Handle the case where address is not found
        $this->address = null;
        $this->city = null;
        $this->country = null;
        $this->address_id = null;
    }



    //Uz pomoc eloquenta:
    $address2 = Address::with('city.country')->findOrFail($addressId);
    //dd($address2);

    if ($address2) {
        $this->address2 = $address2->address;
        $this->city2 = $address2->city->city;
        $this->country2 = $address2->city->country->country;
         $this->address_id2 = $address2->address_id;
    } else {
        // Ukoliko adresa nije nadjena postavi na null
        $this->address2 = null;
        $this->city2 = null;
        $this->country2 = null;
        $this->address_id2 = null; 
    }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.address-component');
    }
}
