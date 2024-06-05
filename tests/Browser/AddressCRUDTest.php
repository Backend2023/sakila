<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AddressCRUDTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testAddressCRUD(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/address/9')
                    ->assertSee('53 Idfu Parkway')
                    ->press('#address_edit')
                    ->pause(2000)
                    ->assertPathIs('/address/9/edit')
                    ->type('input[name="address"]', '54 Idfu Parkway')
                    ->press('#update_address')
                    ->assertPathIs('/address')
                    ->visit('/address/9')
                    ->assertSee('54 Idfu Parkway')
                    ->press('#address_edit')
                    ->pause(2000)
                    ->assertPathIs('/address/9/edit')
                    ->type('input[name="address"]', '53 Idfu Parkway')
                    ->press('#update_address')
                    ->assertPathIs('/address')
                    ;
        });
    }
}
