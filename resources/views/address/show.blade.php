<!-- Layouts Using Components -->
<!-- resources/views/address/show.blade.php -->
<!-- https://tailwindflex.com/@nejaa-badr/tailwind-sidebar-layout-2 -->

<!--   "App\Models\Address::find($address_id)" -->
<x-tailwind-blue-layout>
  <x-adresa :address="App\Models\Address::find(77)"/>
</x-tailwind-blue-layout>
<!--    -->