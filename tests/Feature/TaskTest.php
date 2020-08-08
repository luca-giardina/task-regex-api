<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
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
}
