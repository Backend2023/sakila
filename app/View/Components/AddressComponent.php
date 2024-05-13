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
    public $address2;
    public $city2;
    public $country2;
    /**
     * Create a new component instance.
     */
    public function __construct($addressId)
    {
        $addressInfo = DB::table('addresses')
        ->select('address', 'city', 'country')
        ->join('cities', 'addresses.city_id', '=', 'cities.city_id')
        ->join('countries', 'cities.country_id', '=', 'countries.country_id')
        ->where('addresses.address_id', $addressId)
        ->first();

        

        //dd($addressId);
       // dd($addressInfo);
    $this->address = $addressInfo->address;
    $this->city = $addressInfo->city;
    $this->country = $addressInfo->country;


    $address2 = Address::with('city.country')->findOrFail($addressId);
    $this->address2 = $address2->address;
    $this->city2 = $address2->city->city;
    $this->country2 = $address2->city->country->country;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.address-component');
    }
}
