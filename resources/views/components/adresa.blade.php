
<div style="display: flex;">
    <!-- Be present above all else. - Naval Ravikant -->
    <span style=" border-radius: 15px 50px;
  border: 2px solid #73AD21;
  padding: 20px;
  width: 200px;

  margin: 5px;">
        <p style="font-weight: bold;"><x-icon name="envelope" solid mini />{{ $address->address }} </p>
        <p>Regija: {{ $address->district }}</p> 
        <p>Kreirano: {{ $address->created_at }}</p>
{{-- dd($address) --}}
<br>
<a href="{{ route('address.edit', $address->address_id) }}"  class="bg-transparent hover:bg-green-500 text-green-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">&nbsp;&nbsp;Edit&nbsp;&nbsp;</a><br>
<br>
        <form action="{{ route('address.destroy', $address->address_id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-transparent hover:bg-red-500 text-green-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Delete</button>
        </form>
 
      
    </span>
</div>