<x-tailwind-blue-layout>

<h1>Edit Address</h1>
    <form action="{{ route('address.update', $address->address_id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('address.form', compact('address'))
        <br>
        <button type="submit"  class="bg-transparent hover:bg-green-500 text-green-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Update</button>
    </form>
</x-tailwind-blue-layout>