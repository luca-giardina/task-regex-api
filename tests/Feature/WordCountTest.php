<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WordCountTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
     public function testWordCount()
     {
         $this->withoutExceptionHandling();

         $response = $this->postJson("/api/word-count", [
             "string" => "A man, a plan, a canal -- Panama"
         ]);

         $response->assertStatus(200)
         ->assertJson([
             "result" => [
                 "a" => 3,
                 "man" => 1,
                 "canal" => 1,
                 "panama" => 1,
                 "plan" => 1
             ]
         ]);
     }

     public function testWordCount2()
     {
         $this->withoutExceptionHandling();

         $response = $this->postJson("/api/word-count", [
             "string" => "Doo bee doo bee doo"
         ]);

         $response->assertStatus(200)
         ->assertJson([
             "result" => [
                 "doo" => 3,
                 "bee" => 2             ]
         ]);
     }

     public function testWordCountStringIsRequired()
     {
         $response = $this->postJson("/api/word-count", [
             "string" => ""
         ]);

         $response->assertStatus(422);
     }
}
