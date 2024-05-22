<div>
    <label>Address ID</label>
    <input type="number" name="address_id" value="{{ old('address_id', $customer->address_id ?? '') }}">
</div>
<div>
    <label>First Name</label>
    <input type="text" name="first_name" value="{{ old('first_name', $customer->first_name ?? '') }}">
</div>
<div>
    <label>Last Name</label>
    <input type="text" name="last_name" value="{{ old('last_name', $customer->last_name ?? '') }}">
</div>
<div>
    <label>Email</label>
    <input type="email" name="email" value="{{ old('email', $customer->email ?? '') }}">
</div>
<div>
    <label>Active</label>
    <input type="checkbox" name="active" value="1" {{ old('active', $customer->active ?? 1) ? 'checked' : '' }}>
</div>
