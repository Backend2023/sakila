<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateAddressRequest;
use App\Http\Requests\StoreAddressRequest;

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
    // public function store(Request $request)
    public function store(StoreAddressRequest $request)
    {
        try {
            Address::create($request->validated());

            return redirect()->route('address.index')->with('success', 'Nova adresa je uspješno dodana.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while adding the address.'.$e->getMessage());
        }
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

        // return view('address.show', ['addressId' => $address->address_id]);
        return view('address.show', ['address' => $address]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Address $address)
    {
        return view('address.edit', compact('address'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAddressRequest $request, Address $address)
    {
        // dd($request);

        try {
            $address->update($request->validated());

            return redirect()->route('address.index')->with('success', 'Adresa je uspješno izmjenjena.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the address.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address)
    {
        $address->delete();

        return redirect()->route('address.index')->with('success', 'Address with id ' . $address->address_id . ' deleted successfully.');
    }
}
