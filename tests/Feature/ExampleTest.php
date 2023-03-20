<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\User;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_index_request_is_working()
    {
        $response = $this->get('api/user');
        $response->assertOk();
        $countUsers = collect($response['users'])->count();

        $response->assertJson(fn (AssertableJson $json)
            => $json->has('message')
                ->has('users', $countUsers)
                ->etc()
    );
    }

    public function test_save_users_is_working()
    {
        
    }
}
