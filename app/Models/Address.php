<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// > $adrs = Address::factory()->count(3)->make();   // kreira samo objekt modela
// > $adrs = Address::factory()->count(3)->create(); // kreira objekt po modelu i sprema ga u bazu


class Address extends Model
{
    use HasFactory;
   protected $primaryKey = 'address_id';  // default
   // protected $table = 'addresses';    // default
    protected $fillable=[
            'address',
            'address2',
            'district',
            'city_id',
            'postal_code',           
            'phone'
    ];
}
