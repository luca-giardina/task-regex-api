<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RecursionTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRecursion()
    {
        $this->withoutExceptionHandling();

        $response = $this->postJson('/api/recursion', [
            'string' => 'abc'
        ]);

        $response->assertStatus(200)
        ->assertJson([
            'string' => 'cba'
        ]);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRecursion2()
    {
        $this->withoutExceptionHandling();

        $response = $this->postJson('/api/recursion', [
            'string' => 'this need to be reversed'
        ]);

        $response->assertStatus(200)
        ->assertJson([
            'string' => 'desrever eb ot deen siht'
        ]);
    }
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRecursionStringIsRequired()
    {
        $response = $this->postJson('/api/recursion', [
            'string' => ''
        ]);

        $response->assertStatus(422);
    }
}
