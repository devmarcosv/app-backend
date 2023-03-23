<?php 

namespace App\Domains\Users\Services;

use App\Domains\Users\Database\Repositories\UserRepository;

use function PHPUnit\Framework\isNull;

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

    public function show(int $userId)
    {
        $user = $this->repo->getUserById($userId);

        return $user;
    }

    public function store(array $user)
    {
        $user = $this->repo->createUser($user);

        return $user;

    }

    public function update(array $newUser, int $userId)
    {
        if(isNull($newUser['gender']) && isNull($newUser['date_of_birth'])) {
            unset($newUser['gender'], $newUser['date_of_birth']);

            $user = $this->repo->updateUser($userId, $newUser);

        }
        
        $user = $this->repo->updateUser($userId, $newUser);

        return $user;
    }
}