<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;

class AddressComponent extends Component
{
    public $address;
    public $city;
    public $country;
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
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.address-component');
    }
}
