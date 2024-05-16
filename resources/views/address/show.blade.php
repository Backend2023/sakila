<!-- Layouts Using Components -->
<!-- resources/views/address/show.blade.php -->
<!-- https://tailwindflex.com/@nejaa-badr/tailwind-sidebar-layout-2 -->

<!--    -->
<x-tailwind-blue-layout>
    <x-icon name="building-office-2" />
    <x-icon name="building-office-2" solid />
    <x-icon name="building-office-2" solid mini />

    <x-address-component :addressId="$addressId" />

    <hr>
    <x-address-component :addressId="77" />

    <hr>
    <x-address-component :addressId="122" />

    <div><img src="/slike/LaravelComponent.png" style="width:100%;"></div>
    <div><img src="/slike/Address2.png" style="width:100%;"></div>
</x-tailwind-blue-layout>
<!--    -->