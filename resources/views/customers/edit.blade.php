<x-tailwind-blue-layout>

<h1>Edit Customer</h1>
    <form action="{{ route('customers.update', $customer->customer_id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('customers.form', ['customer' => $customer])
        <button type="submit">Update</button>
    </form>
</x-tailwind-blue-layout>