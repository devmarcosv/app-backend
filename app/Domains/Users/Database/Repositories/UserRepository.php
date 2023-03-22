<?php

namespace App\Domains\Users\Database\Repositories;

use App\Contracts\Users\IUserRepository;
use App\Models\User;

class UserRepository implements IUserRepository
{

    public function getAllUsers(?array $filters)
    {
        return User::all();
    }

    public function getUserById(int $userId)
    {
        //
        return User::query()
        ->where('id', $userId)
        ->get();
    }

    public function createUser(array $user)
    {
        //
        return User::create($user);
        
    }

    public function deleteUser(int $userId)
    {
        //
    }

    public function updateUser(int $userId, array $newUser)
    {
        //
        $user = User::query()->find($userId);
        $userUpdated = $user->updateOrFail($newUser);

        return $userUpdated ? $user->fresh() : null;
        
    }
}