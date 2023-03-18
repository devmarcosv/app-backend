<?php 

namespace App\Domains\Users\Http\Controllers;

use App\Domains\Users\Http\Requests\IndexRequest;
use App\Domains\Users\Http\Requests\StoreUserRequest;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    
    public function __construct()
    {

    }

    public function index(IndexRequest $request)
    {
        //
        dd($request->all());
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