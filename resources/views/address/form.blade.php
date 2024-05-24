<div>
    <label>address</label>
    <input type="text" name="address" value="{{ old('address', $address->address ?? '') }}">
</div>
<div>
    <label>address2</label>
    <input type="text" name="address2" value="{{ old('address2', $address->address2 ?? '') }}">
</div>
<div>
    <label>city_id</label>
    <input type="number" name="city_id" value="{{ old('city_id', $address->city_id ?? '') }}">
</div>
<div>
    <label>postal_code</label>
    <input type="text" name="postal_code" value="{{ old('postal_code', $address->postal_code ?? '') }}">
</div>
<div>
    <label>phone</label>
    <input type="text" name="phone" value="{{ old('phone', $address->phone ?? '') }}">
</div>

