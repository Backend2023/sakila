<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//$ php artisan model:show Country
//App\Models\Country::all();

class Country extends Model
{
    use HasFactory;
    protected $fillable = [
    'Country'
    ];
        
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'country_id';
   
}


/**
 *  php artisan tinker
 Psy Shell v0.12.3 (PHP 8.2.12 — cli) by Justin Hileman
> $c1= new App\Models\Country;
= App\Models\Country {#5425}

> $c1->Country='Lalaland';
= "Lalaland"

> $c1->save();
= true

> $c1
= App\Models\Country {#5425
    Country: "Lalaland",
    updated_at: "2024-04-24 19:15:08",
    created_at: "2024-04-24 19:15:08",
    id: 779,
  }
 
 */
