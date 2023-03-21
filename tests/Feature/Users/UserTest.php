<?php

namespace Tests\Feature\Users;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;


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
        $response = $this->post('api/user', [
            'name' => 'Marcos vinicius',
            'password' => '12345678',
            'email' => 'emaillegal@gmail.com',
            'date_of_birth' => now()->format('d/m/Y'),
            'gender' => 'M'
        ]);
        
        $response->assertCreated();
        $response->assertJson(fn (AssertableJson $json)
            => $json->has('message')
                ->has('code')
                ->has('user')
                 
    );
    }
}
