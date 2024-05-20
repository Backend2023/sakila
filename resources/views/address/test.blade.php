<!-- resources/views/address/test.blade.php -->
<!-- http://127.0.0.1:8000/addresstest  -->

@extends('layouts.bootstrap')

@section('title', 'Address komponenta grad i drzava')

@section('sidebar')


<p>Ovo je dodano na vrh sectiona test.blade.php</p>

@parent
@endsection

@section('content')
<p>This is my body content.</p>
<x-icon name="building-office-2" />
<x-icon name="building-office-2" solid />
<x-icon name="building-office-2" solid mini />

<!-- routes/web.php : -->
<!-- Route::view('/addresstest', 'address.test', ['addressId' => '7'])->name('address.test'); -->
<x-address-component :addressId="$addressId" />

<hr>
<x-address-component :addressId="77" />

<hr>
<x-address-component :addressId="122" />

<div><img src="/slike/LaravelComponent.png" style="width:100%;"></div>
<div><img src="/slike/Address2.png" style="width:100%;"></div>


@endsection