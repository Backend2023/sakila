<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

// > $adrs = Address::factory()->count(3)->make();   // kreira samo objekt modela
// > $adrs = Address::factory()->count(3)->create(); // kreira objekt po modelu i sprema ga u bazu


// -----------------------------

// SVAKI PUTA KAD MIJENJAMO MODEL

// $ composer du
// Generating optimized autoload files

// -----------------------------

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
    
    public function city(): BelongsTo
    {
       //  City::find(567)->country()->get()->first()->country;
       //= "Argentina"

        return $this->belongsTo(City::class,'city_id');
    }
    /**
     * hohvati mi ime zemlje kojoj pripadam
     * 
     * //UMJESTO:
     * Address::where('district','Buenos Aires')->get()->first()->city()->get()->first()->country()->get()->first()
     * 
     * // MOZEMO SADA SKRACENO
     * > Address::where('district','Buenos Aires')->first()->zemlja()->first();
     */
    public function zemlja(): HasOneThrough
    {
        return $this->hasOneThrough(
            Country::class,   // što zelimo dohvatiti (konačni)
            City::class,      // preko kojeg modela (prijelazni)
            'city_id',       // strani kljuc u Modelu kojeg zelimo dohvatiti
            'country_id',    // strani ključ prijelaznog modela
            'city_id',     // lokalni kljuc u tablici Address (obično:id)
            'country_id',  // lokalni kljuc u tablici City (obično:id)

        );
    }
}


/* public function carOwner(): HasOneThrough
{
    return $this->hasOneThrough(
        Owner::class,
        Car::class,
        'mechanic_id', // Foreign key on the cars table...
        'car_id', // Foreign key on the owners table...
        'id', // Local key on the mechanics table...
        'id' // Local key on the cars table...
    );
} */