<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
   /*      DB::table('countries')->insert([
          //  'country' => Str::random(10)  // random string
          // 'country' => fake()->country   // faker country
        ]); */
  
        $country = array(
            array(
                "country_id" => 1,
                "country" => "Afghanistan",
            ),
            array(
                "country_id" => 2,
                "country" => "Algeria",
            ),
            array(
                "country_id" => 3,
                "country" => "American Samoa",
            ),
            array(
                "country_id" => 4,
                "country" => "Angola",
            ),
            array(
                "country_id" => 5,
                "country" => "Anguilla",
            ),
            array(
                "country_id" => 6,
                "country" => "Argentina",
            ),
            array(
                "country_id" => 7,
                "country" => "Armenia",
            ),
            array(
                "country_id" => 8,
                "country" => "Australia",
            ),
            array(
                "country_id" => 9,
                "country" => "Austria",
            ),
            array(
                "country_id" => 10,
                "country" => "Azerbaijan",
            ),
            array(
                "country_id" => 11,
                "country" => "Bahrain",
            ),
            array(
                "country_id" => 12,
                "country" => "Bangladesh",
            ),
            array(
                "country_id" => 13,
                "country" => "Belarus",
            ),
            array(
                "country_id" => 14,
                "country" => "Bolivia",
            ),
            array(
                "country_id" => 15,
                "country" => "Brazil",
            ),
            array(
                "country_id" => 16,
                "country" => "Brunei",
            ),
            array(
                "country_id" => 17,
                "country" => "Bulgaria",
            ),
            array(
                "country_id" => 18,
                "country" => "Cambodia",
            ),
            array(
                "country_id" => 19,
                "country" => "Cameroon",
            ),
            array(
                "country_id" => 20,
                "country" => "Canada",
            ),
            array(
                "country_id" => 21,
                "country" => "Chad",
            ),
            array(
                "country_id" => 22,
                "country" => "Chile",
            ),
            array(
                "country_id" => 23,
                "country" => "China",
            ),
            array(
                "country_id" => 24,
                "country" => "Colombia",
            ),
            array(
                "country_id" => 25,
                "country" => "Congo, The Democratic Republic of the",
            ),
            array(
                "country_id" => 26,
                "country" => "Czech Republic",
            ),
            array(
                "country_id" => 27,
                "country" => "Dominican Republic",
            ),
            array(
                "country_id" => 28,
                "country" => "Ecuador",
            ),
            array(
                "country_id" => 29,
                "country" => "Egypt",
            ),
            array(
                "country_id" => 30,
                "country" => "Estonia",
            ),
            array(
                "country_id" => 31,
                "country" => "Ethiopia",
            ),
            array(
                "country_id" => 32,
                "country" => "Faroe Islands",
            ),
            array(
                "country_id" => 33,
                "country" => "Finland",
            ),
            array(
                "country_id" => 34,
                "country" => "France",
            ),
            array(
                "country_id" => 35,
                "country" => "French Guiana",
            ),
            array(
                "country_id" => 36,
                "country" => "French Polynesia",
            ),
            array(
                "country_id" => 37,
                "country" => "Gambia",
            ),
            array(
                "country_id" => 38,
                "country" => "Germany",
            ),
            array(
                "country_id" => 39,
                "country" => "Greece",
            ),
            array(
                "country_id" => 40,
                "country" => "Greenland",
            ),
            array(
                "country_id" => 41,
                "country" => "Holy See (Vatican City State)",
            ),
            array(
                "country_id" => 42,
                "country" => "Hong Kong",
            ),
            array(
                "country_id" => 43,
                "country" => "Hungary",
            ),
            array(
                "country_id" => 44,
                "country" => "India",
            ),
            array(
                "country_id" => 45,
                "country" => "Indonesia",
            ),
            array(
                "country_id" => 46,
                "country" => "Iran",
            ),
            array(
                "country_id" => 47,
                "country" => "Iraq",
            ),
            array(
                "country_id" => 48,
                "country" => "Israel",
            ),
            array(
                "country_id" => 49,
                "country" => "Italy",
            ),
            array(
                "country_id" => 50,
                "country" => "Japan",
            ),
            array(
                "country_id" => 51,
                "country" => "Kazakstan",
            ),
            array(
                "country_id" => 52,
                "country" => "Kenya",
            ),
            array(
                "country_id" => 53,
                "country" => "Kuwait",
            ),
            array(
                "country_id" => 54,
                "country" => "Latvia",
            ),
            array(
                "country_id" => 55,
                "country" => "Liechtenstein",
            ),
            array(
                "country_id" => 56,
                "country" => "Lithuania",
            ),
            array(
                "country_id" => 57,
                "country" => "Madagascar",
            ),
            array(
                "country_id" => 58,
                "country" => "Malawi",
            ),
            array(
                "country_id" => 59,
                "country" => "Malaysia",
            ),
            array(
                "country_id" => 60,
                "country" => "Mexico",
            ),
            array(
                "country_id" => 61,
                "country" => "Moldova",
            ),
            array(
                "country_id" => 62,
                "country" => "Morocco",
            ),
            array(
                "country_id" => 63,
                "country" => "Mozambique",
            ),
            array(
                "country_id" => 64,
                "country" => "Myanmar",
            ),
            array(
                "country_id" => 65,
                "country" => "Nauru",
            ),
            array(
                "country_id" => 66,
                "country" => "Nepal",
            ),
            array(
                "country_id" => 67,
                "country" => "Netherlands",
            ),
            array(
                "country_id" => 68,
                "country" => "New Zealand",
            ),
            array(
                "country_id" => 69,
                "country" => "Nigeria",
            ),
            array(
                "country_id" => 70,
                "country" => "North Korea",
            ),
            array(
                "country_id" => 71,
                "country" => "Oman",
            ),
            array(
                "country_id" => 72,
                "country" => "Pakistan",
            ),
            array(
                "country_id" => 73,
                "country" => "Paraguay",
            ),
            array(
                "country_id" => 74,
                "country" => "Peru",
            ),
            array(
                "country_id" => 75,
                "country" => "Philippines",
            ),
            array(
                "country_id" => 76,
                "country" => "Poland",
            ),
            array(
                "country_id" => 77,
                "country" => "Puerto Rico",
            ),
            array(
                "country_id" => 78,
                "country" => "Romania",
            ),
            array(
                "country_id" => 79,
                "country" => "Réunion",
            ),
            array(
                "country_id" => 80,
                "country" => "Russian Federation",
            ),
            array(
                "country_id" => 81,
                "country" => "Saint Vincent and the Grenadines",
            ),
            array(
                "country_id" => 82,
                "country" => "Saudi Arabia",
            ),
            array(
                "country_id" => 83,
                "country" => "Senegal",
            ),
            array(
                "country_id" => 84,
                "country" => "Slovakia",
            ),
            array(
                "country_id" => 85,
                "country" => "South Africa",
            ),
            array(
                "country_id" => 86,
                "country" => "South Korea",
            ),
            array(
                "country_id" => 87,
                "country" => "Spain",
            ),
            array(
                "country_id" => 88,
                "country" => "Sri Lanka",
            ),
            array(
                "country_id" => 89,
                "country" => "Sudan",
            ),
            array(
                "country_id" => 90,
                "country" => "Sweden",
            ),
            array(
                "country_id" => 91,
                "country" => "Switzerland",
            ),
            array(
                "country_id" => 92,
                "country" => "Taiwan",
            ),
            array(
                "country_id" => 93,
                "country" => "Tanzania",
            ),
            array(
                "country_id" => 94,
                "country" => "Thailand",
            ),
            array(
                "country_id" => 95,
                "country" => "Tonga",
            ),
            array(
                "country_id" => 96,
                "country" => "Tunisia",
            ),
            array(
                "country_id" => 97,
                "country" => "Turkey",
            ),
            array(
                "country_id" => 98,
                "country" => "Turkmenistan",
            ),
            array(
                "country_id" => 99,
                "country" => "Tuvalu",
            ),
            array(
                "country_id" => 100,
                "country" => "Ukraine",
            ),
            array(
                "country_id" => 101,
                "country" => "United Arab Emirates",
            ),
            array(
                "country_id" => 102,
                "country" => "United Kingdom",
            ),
            array(
                "country_id" => 103,
                "country" => "United States",
            ),
            array(
                "country_id" => 104,
                "country" => "Venezuela",
            ),
            array(
                "country_id" => 105,
                "country" => "Vietnam",
            ),
            array(
                "country_id" => 106,
                "country" => "Virgin Islands, U.S.",
            ),
            array(
                "country_id" => 107,
                "country" => "Yemen",
            ),
            array(
                "country_id" => 108,
                "country" => "Yugoslavia",
            ),
            array(
                "country_id" => 109,
                "country" => "Zambia",
            )
            );
        DB::table('countries')->delete(); // obrisi podatke iz tablice
        DB::table('countries')->insert($country); // ubaci podatke 
        // DB::table('countries')->update(['created_at' => Illuminate\Support\Carbon::now()]);
        DB::table('countries')->update(['created_at' => Carbon::now()]);  //MOŽE !!

        DB::statement("UPDATE `sakila`.`countries` SET `updated_at` = CURRENT_TIMESTAMP"); //MOŽE !!

// OVO ne može jer raw ne izvršava query
//    DB::table('countries')->raw('UPDATE `sakila`.`countries` SET `created_at`=CURRENT_TIMESTAMP WHERE `created_at` IS NULL');

//     Why use DB::statement() over DB::raw() in this case?
// DB::raw() is used to create a raw SQL expression that can be used as a part of a larger SQL query, but it does not execute a query by itself.
// DB::statement() is used to execute a standalone SQL statement directly, which is suitable for UPDATE operations without returning results.

    }
}



