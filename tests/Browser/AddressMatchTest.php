<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AddressMatchTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *    PASS  Tests\Browser\AddressMatchTest
     *   ✓ match rute     
     */
    public function testMatchRute(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/testmatch') //http://localhost:8000/testmatch
                    ->assertSee('Hello World iz match rute')
                    ->screenshot('testmatch');
        });
    }
}
