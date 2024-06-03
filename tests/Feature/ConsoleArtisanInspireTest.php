<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConsoleArtisanInspireTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_console_command(): void
    {
        $this->artisan('inspire')->assertExitCode(0);

        //ocekujem Process #18752 closed with exit code 2.
        //$this->artisan('inspiriraj')->assertExitCode(2);
       // $this->artisan('inspiriraj')->assertFailed();

        // Symfony\Component\Console\Exception\CommandNotFoundException
        $this->expectException(\Symfony\Component\Console\Exception\CommandNotFoundException::class);
        $this->artisan('inspiriraj')->assertFailed();
    }
}
