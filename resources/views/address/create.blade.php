<x-tailwind-blue-layout>

<h1>Add Customer</h1>
    <form action="{{ route('address.store') }}" method="POST">
        @csrf
        @include('address.form')
        <button type="submit">Add</button>
    </form>

</x-tailwind-blue-layout>