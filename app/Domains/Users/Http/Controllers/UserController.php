<?php 

namespace App\Domains\Users\Http\Controllers;

use App\Domains\Users\Http\Requests\IndexRequest;
use App\Domains\Users\Http\Requests\StoreUserRequest;
use App\Domains\Users\Http\Requests\UpdateUserRequest;
use App\Domains\Users\Services\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

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

    public function show(int $userId)
    {
        $isLogged = auth()->user();
        if(!$isLogged) {

            return response()->json(['error' => 'Unauthenticated.'], 401);

        }
        $user = $this->service->show($userId);

        return response()->json([
            'message' => 'success',
            'user' => $user
        ], Response::HTTP_OK);
    }

    public function store(StoreUserRequest $request)
    {
        try {
            $user = $this->service->store($request->validated());

            return response()->json([
                'message' => 'success',
                'code' => 201,
                'user' => $user,
                'token' => $user->createToken('API TOKEN')->plainTextToken
            ], Response::HTTP_CREATED);

        }catch(\Exception $e){
            throw new \Exception("houve um erro ao salvar: ".$e->getMessage());
        }

    }

    public function update(UpdateUserRequest $request, int $userId)
    {
        try {
            $user = $this->service->update($request->validated(), $userId);

            return response()->json([
                'message' => 'success',
                'code' => 200,
                'user_updated' => $user
            ], Response::HTTP_OK);

        }catch(\Exception $e){
            throw new \Exception("Houve um erro ao atualizar: ".$e->getMessage());
        }
    }

    public function destroy()
    {
        //
    }
}