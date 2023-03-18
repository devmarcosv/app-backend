<?php

namespace App\Contracts\Users;


interface IUserRepository
{
    public function getAllUsers(?array $filters);
    public function getUserById(int $userId);
    public function deleteUser(int $userId);
    public function createUser(array $user);
    public function updateUser(int $userId, array $newUser);
}