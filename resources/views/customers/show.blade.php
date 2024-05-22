<!-- Layouts Using Components -->
<!-- resources/views/address/show.blade.php -->
<!-- https://tailwindflex.com/@nejaa-badr/tailwind-sidebar-layout-2 -->

<!--    -->
<x-tailwind-blue-layout>
<h1>Customer Details</h1>
    <p>Store ID: {{ $customer->store_id }}</p>
    <p>Address ID: {{ $customer->address_id }}</p>
    <p>First Name: {{ $customer->first_name }}</p>
    <p>Last Name: {{ $customer->last_name }}</p>
    <p>Email: {{ $customer->email }}</p>
    <p>Active: {{ $customer->active ? 'Yes' : 'No' }}</p>
    <p>Created At: {{ $customer->create_date }}</p>
    <p>Last Updated: {{ $customer->last_update }}</p>
    <a href="{{ route('customers.index') }}">Back to list</a>
<hr>
<h3>Komponenta adresa</h3>
    <x-address-component :addressId="$customer->address_id"/>
 
    <x-adresa :address="App\Models\Address::find($customer->address_id)"/>
</x-tailwind-blue-layout>
<!--    -->