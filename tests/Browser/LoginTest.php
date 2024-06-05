<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testIspuniLoginFormu(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->assertSee('Email')
                ->assertSee('Password');

            //user: alejandrin70@example.net 
            //pass: alejandrin70@example.net
            $browser->type('input[name="email"]', 'alejandrin70@example.net')
                ->type('input[name="password"]', 'alejandrin70@example.net')
                ->screenshot('login nakon unosta ime i pass')
               // ->press('logirajme')
                ->check('remember')
                //->press('Log in')
                ->screenshot('login prije sto stisne dugme')
                ->press('#logirajme')
                ->pause(3000)
                ->assertPathIs('/component')
                ->screenshot('login nakon sto stisne dugme');
        });
    }
}
