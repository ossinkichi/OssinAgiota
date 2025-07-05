<?php

namespace App\Http\Controllers;

use App\DTOs\ShowUserDto;
use App\DTOs\UserDto;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\ShowUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UsersController extends Controller
{

    public function show(int $id, UserService $service): JsonResponse
    {
        $user = $service->show($id);
        $user = UserDto::make($user->toArray());

        return response()->json([
            'message' => 'Usuário encontrado com sucesso!',
            'user' => $user->JsonSerialize()
        ]);
    }

    public function create(RegisterUserRequest $req, UserService $service): JsonResponse
    {
        $service->create($req->toDto());

        return response()->json([], 201);
    }

    public function login(LoginUserRequest $req, UserService $service): JsonResponse
    {
        $user = $service->login($req->toDTO());
        $user = UserDto::make($user->toArray());

        return \response()->json([
            'message' => 'Usuário logado com sucesso!',
            'user' => $user->JsonSerialize(),
        ], 200);
    }

    public function update(UpdateUserRequest $req, UserService $service): JsonResponse
    {
        $user = $service->update($req->toDTO());

        return \response()->json([], 201);
    }
}
