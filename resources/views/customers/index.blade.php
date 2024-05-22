<x-tailwind-blue-layout>

<h1>Customers</h1>
    <a href="{{ route('customers.create') }}">Add Customer</a>
    <ul>
        @foreach ($customers as $customer)
            <li>
                <a href="{{ route('customers.show', $customer->customer_id) }}">{{ $customer->first_name }} {{ $customer->last_name }}</a>
                <a href="{{ route('customers.edit', $customer->customer_id) }}">Edit</a>
                <form action="{{ route('customers.destroy', $customer->customer_id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>

</x-tailwind-blue-layout>