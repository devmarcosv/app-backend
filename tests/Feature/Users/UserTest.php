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

    public function test_edit_user_is_working()
    {
        $this->seed();

        $teste = User::query()->first();

        $response = $this->put("api/user/{$teste->id}", [
            'name' => 'Monkey D. Luffy',
            'password' => '12345678',
            'email' => 'lawtrafalgar@gmail.com',
            'date_of_birth' => null,
            'gender' => null
        ]);
        $response->assertStatus(200);
        $response->assertJson(fn (AssertableJson $json)
            => $json->has('message')
                    ->has('code')
                    ->has('user_updated',  fn ($user)
                        => $user->where('id', 2)            
                                ->where('name', 'Monkey D. Luffy')
                                ->where('email', fn ($email)
                                    => str($email)->is('lawtrafalgar@gmail.com')
                                )
                                ->etc()
         )
        );
     }

     public function test_get_user_by_id_is_working()
     {
        $this->seed();

        $user = User::query()->first();

        $response = $this->get("api/user/{$user->id}");
        $response->assertStatus(200);
     }
}
