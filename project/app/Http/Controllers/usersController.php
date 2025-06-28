<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UsersController extends Controller
{
    public function create(RegisterUserRequest $ruq, UserService $service): JsonResponse
    {
        $service->create($ruq->toDto());

        return response()->json([], 201);
    }

    public function login(LoginUserRequest $lur, UserService $service): JsonResponse
    {
        $user = $service->login($lur->toDTO());

        return \response()->json([
            'message' => 'Usuário logado com sucesso!',
            'user' => $user,
        ], 200);
    }

    public function update(UpdateUserRequest $uur, UserService $service): JsonResponse
    {
        $user = $service->update($uur->toDTO());

        return \response()->json([
            'message' => 'Usuário atualizado com sucesso!',
            'user' => $user
        ], 200);
    }
}
