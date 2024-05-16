<!-- resources/views/address/show.blade.php -->

@extends('layouts.bootstrap')

@section('title', 'Address komponenta grad i drzava')

@section('sidebar')
@parent

<p>This is appended to the master sidebar.</p>
@endsection

@section('content')
<p>This is my body content.</p>
<x-icon name="building-office-2" />
<x-icon name="building-office-2" solid />
<x-icon name="building-office-2" solid mini />

<x-address-component :addressId="$addressId" />

<hr>
<x-address-component :addressId="77" />

<hr>
<x-address-component :addressId="122" />

<div><img src="/slike/LaravelComponent.png" style="width:100%;"></div>
<div><img src="/slike/Address2.png" style="width:100%;"></div>


@endsection