<x-tailwind-blue-layout>

<h1>Add Customer</h1>
    <form action="{{ route('customers.store') }}" method="POST">
        @csrf
        @include('customers.form')
        <button type="submit">Add</button>
    </form>

</x-tailwind-blue-layout>