<?php 

namespace App\Domains\Users\Services;

use App\Domains\Users\Database\Repositories\UserRepository;

class UserService 
{
    private $repo;

    public function __construct(UserRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        $user = $this->repo->getAllUsers([]);

        return $user;
    }
}