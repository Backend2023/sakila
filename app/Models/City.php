<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    use HasFactory;

    protected $primaryKey = 'city_id';
     protected $guarded = [];  // umjesto fillable možemo i guarded

     public function country(): BelongsTo
     {
        //  City::find(567)->country()->get()->first()->country;
        //= "Argentina"

         return $this->belongsTo(Country::class,'country_id');
     }
     
     public function mojazemlja(): BelongsTo
     {
        //  City::find(567)->country()->get()->first()->country;
        //= "Argentina"

         return $this->belongsTo(Country::class,'country_id');
     }
         /**
     * Dohvati mi sve adrese u ovom gradu
     */
    public function adrese(): HasMany
    {
        // City::find(300)->adrese()->get();
        return $this->hasMany(Address::class, 'city_id');
    }
}
