<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PalindrimesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
     public function testPalindrimes()
     {
         $this->withoutExceptionHandling();

         $response = $this->postJson('/api/palindrimes', [
             'string' => 'A man, a plan, a canal -- Panama'
         ]);

         $response->assertStatus(200)
         ->assertJson([
             'result' => true
         ]);
     }

}
