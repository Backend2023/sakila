
<div style="display: flex;">
    <!-- Be present above all else. - Naval Ravikant -->
    <span style=" border-radius: 15px 50px;
  border: 2px solid #73AD21;
  padding: 20px;
  width: 200px;
  height: 200px;
  margin: 5px;">
        <p style="font-weight: bold;"><x-icon name="envelope" solid mini />{{ $address->address }} </p>
        <p>Regija: {{ $address->district }}</p> 
        <p>Kreirano: {{ $address->created_at }}</p>
    </span>
</div>