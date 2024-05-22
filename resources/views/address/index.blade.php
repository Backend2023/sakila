<x-tailwind-blue-layout>

<h3>Komponenta address-component</h3>
@foreach ($adrese as $a)
<x-address-component :addressId="$a->address_id"/>
@endforeach

<hr>
<h3>Komponenta adresa</h3>

@foreach ($adrese as $a)
   <x-adresa :address="$a"/>
@endforeach


<x-address-component :addressId="77" />
<x-address-component :addressId="99" />

</x-tailwind-blue-layout>