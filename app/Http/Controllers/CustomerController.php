<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Support\Facades\Gate;


class CustomerController extends Controller
{
    public function __construct()
{
    // Example: If using Laravel's built-in authorization
   // $this->authorizeResource(Customer::class, 'customer');
}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request, Customer $customer)
    {
        $this->authorize('create-customer');
        
        if (Gate::any(['create-customer',], $customer)) {
            // The user can update or delete the post...
        }
        return "hello";
/*         $validated = $request->validate([
          //  'store_id' => 'required|integer',  // izbacio zbog jednostavnosti
            'address_id' => 'required|integer',
            'first_name' => 'required|string|max:45',
            'last_name' => 'required|string|max:45',
            'email' => 'nullable|email|max:50',
            'active' => 'required|boolean',
        ]);

        Customer::create($validated);

//TODO fix the "This action is unauthorized" 
        return redirect()->route('customers.index')->with('success', 'Customer created successfully.'); */
    }


    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $validated = $request->validate([
         //   'store_id' => 'required|integer',
            'address_id' => 'required|integer',
            'first_name' => 'required|string|max:45',
            'last_name' => 'required|string|max:45',
            'email' => 'nullable|email|max:50',
            'active' => 'required|boolean',
        ]);

        $customer->update($validated);

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
}
