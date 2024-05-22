<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adrese = Address::all()->take(4);  //ima ih 600!
        return view('address.index', compact('adrese'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('address.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

         $validated = $request->validate([
            'address' => 'required|string|max:45',
            'address2' => 'required|string|max:45',
            'district' => 'required|string|max:45',
            'city_id' => 'required|integer',
            'postal_code' => 'required|string|max:45',           
            'phone' => 'required|string|max:45',
        ]);

dd($validated);
        //TODO provjeri sa tinkerom 
        Address::create($validated);
 
        return redirect()->route('addresses.index')->with('success', 'Address created successfully.'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Address $address)
    {
        //    http://127.0.0.1:8000/address/7
        //
        // > $address= Address::find(7);
        // = App\Models\Address {#6645
        //     address_id: 7,
        //     address: "692 Joliet Street",
        //     address2: "",
        //     district: "Attika",
        //     city_id: 38,
        //     postal_code: "83579",
        //     phone: "448477190408",
        //     created_at: "2024-05-08 18:33:20",
        //     updated_at: null,
        //   }

        return view('address.show', ['addressId' => $address->address_id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Address $address)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address)
    {
        //
    }
}
