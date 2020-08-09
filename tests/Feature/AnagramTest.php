<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AnagramTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
     public function testAnagram()
     {
         $this->withoutExceptionHandling();

         $response = $this->postJson("/api/anagram", [
             "string" => "['cars', 'for', 'potatoes', 'racs', 'four', 'scar', 'creams', 'scream']"
         ]);

         $response->assertStatus(200)
         ->assertJson([
             "result" => [
                 ["cars", "racs", "scar"],
                 ["for"],
                 ["potatoes"],
                 ["four"],
                 ["creams", "scream"]
             ]
         ]);
     }

     public function testAnagram2()
     {
         $this->withoutExceptionHandling();

         $response = $this->postJson("/api/anagram", [
             "string" => "['Bag', 'gba', 'pop', 'p', 'ppo']"
         ]);

         $response->assertStatus(200)
         ->assertJson([
             "result" => [
                 ["Bag", "gba"],
                 ["pop", "ppo"],
                 ["p"]
             ]
         ]);
     }

     public function testAnagramEmptyString()
     {
         $response = $this->postJson("/api/anagram", [
             "string" => ""
         ]);

         $response->assertStatus(422);
     }

     public function testAnagramNotValidJson()
     {
         $response = $this->postJson("/api/anagram", [
             "string" => "['Bag'gba', 'pop', 'p', 'ppo']"
         ]);

         $response->assertStatus(422);
     }
}
