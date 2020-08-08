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

     public function testPalindrimes2()
     {
         $this->withoutExceptionHandling();

         $response = $this->postJson('/api/palindrimes', [
             'string' => "Madam, I'm Adam!"
         ]);

         $response->assertStatus(200)
         ->assertJson([
             'result' => true
         ]);
     }

     public function testPalindrimes3()
     {
         $this->withoutExceptionHandling();

         $response = $this->postJson('/api/palindrimes', [
             'string' => "Abracadabra"
         ]);

         $response->assertStatus(200)
         ->assertJson([
             'result' => false
         ]);
     }

}
