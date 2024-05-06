<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * - napravi unit test za kreiranje usera "alejandrin70@example.net"
     */
    public function run(): void
    {
        $users = array(
            array(
              //  "id" => 1,
                "name" => "alejandrin70@example.net",
                "email" => "alejandrin70@example.net",
             //   "email_verified_at" => NULL,
                "password" => "$2y$12$41b45EihJgGWqMUaqExFI.CT5oc8kK.usaPoo2VEzcNyACT/rW6be",
             //   "remember_token" => "Z5NcsvhWEFghmSF4kUJTn1RjRFEjxZmXplmerL02HT8U72OY0HHTZcbJ5N7e",
             //   "created_at" => "2024-05-06 17:50:27",
             //   "updated_at" => "2024-05-06 17:50:27",
            ),
        );
        
        DB::table('users')->delete(); // obrisi podatke iz tablice
        DB::table('users')->insert($users); // ubaci podatke   

        // dohvati mi ID od prvog usera u tablici
        $first_user_id = DB::scalar('SELECT id FROM users WHERE `email` LIKE ? ',["alejandrin70@example.net"]);

        DB::update('UPDATE `sakila`.`users` SET `email_verified_at`=NULL WHERE  `id`=?',[$first_user_id]);
        
        DB::update('UPDATE `sakila`.`users` 
        SET `remember_token`="Z5NcsvhWEFghmSF4kUJTn1RjRFEjxZmXplmerL02HT8U72OY0HHTZcbJ5N7e" 
        WHERE  `id`=?',[$first_user_id]);

        DB::table('users')->update(['created_at' => Carbon::now()]);  //MOŽE !!
        DB::table('users')->update(['updated_at' => NULL]);  //Proba, ako ne uspije NULL moramonga staviti u navodnike
    }
}
