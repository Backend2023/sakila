<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;


class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     */
    public function testKaoKorisnikBrojJedanOdiNaHome(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                ->visit('/')
                ->screenshot('dusk_screeenshot_pocetha_stranica');
            // $browser->visit('/')
            //         ->assertSee('Laravel');
        });
    }
}
