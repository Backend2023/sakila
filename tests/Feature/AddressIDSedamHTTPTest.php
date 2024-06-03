<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AddressIDSedamHTTPTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_uvjeri_se_da_ne_postoji_adresa_id_7(): void
    {
       $response = $this->get('/address/7');
        $response->assertStatus(404);
    }
    public function test_uvjeri_se_da_ne_smijest_POST_na_adresa_id_7(): void
    {
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->post('/address/7', ['name' => 'Sally']);

        $response->assertStatus(405);
    }
    public function test_uvjeri_se_da_postoji_adresa_id_77(): void
    {
       $response = $this->get('/address/77');
        $response->assertStatus(200);
    }
    public function test_POST_na_testmatch(): void
    {
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->post('/testmatch', ['name' => 'Sally']);

        $response->assertStatus(200);
        $response->assertSee("Hello World iz match rute", $escaped = true);
    //    $response->assertHeader("SERVER_PROTOCOL","HTTP/1.1");
    //    $response->assertHeader("SERVER_NAME", "localhost");
    //    $response->assertHeader("HTTP_ACCEPT" , "text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8");
       $response->ddHeaders();
      // dd($response);
    }
}
