<?php 

namespace App\Domains\Users\Http\Controllers;

use App\Domains\Users\Http\Requests\IndexRequest;
use App\Domains\Users\Http\Requests\StoreUserRequest;
use App\Domains\Users\Services\UserService;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    private $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function index(IndexRequest $request)
    {
        //
        try {
            $service = $this->service->index($request->all());

            return response()->json([
                'message' => 'success',
                'users' => $service,
                'code' => 200
            ]);

        }catch(\Exception $e) {
            throw new \Exception('Não foi possivel retornar o usuário:'.$e->getMessage());
        }

    }

    public function show()
    {
        //
    }

    public function store(StoreUserRequest $request)
    {
        //

    }

    public function update()
    {
        //
    }

    public function destroy()
    {
        //
    }
}