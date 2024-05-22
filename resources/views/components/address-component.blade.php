<div style="display: flex;">
    <!-- Be present above all else. - Naval Ravikant -->
    <span  style=" border-radius: 15px 50px;
  border: 2px solid coral;
  padding: 20px;
  width: 200px;
  height: 200px;
  margin: 5px;">
        <p><x-icon name="home-modern" solid mini />Address: {{ $address }} </p>
        <p>City: {{ $city }}</p>
        <p>Country: {{ $country }}</p>
        <p><a href="/address/{{ $address_id }}">show</a></p>
    </span>
    
    <span  style=" border-radius: 15px 50px;
  border: 2px solid deepskyblue;
  padding: 20px;
  width: 200px;
  height: 200px;
  margin: 5px;">
        <p><x-icon name="home-modern" solid mini />Address: {{ $address2 }} </p>
        <p>City: {{ $city2 }}</p>
        <p>Country: {{ $country2 }}</p>
    </span>

</div>