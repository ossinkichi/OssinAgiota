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
use Illuminate\Routing\Controller;

class UsersController extends Controller
{

    public function show(int $id, UserService $service): JsonResponse
    {
        try {
            $user = $service->show($id);
            $user = UserDto::make($user->toArray());

            return response()->json(data: [
                'message' => 'Usuário encontrado com sucesso!',
                'user' => $user->JsonSerialize()
            ], status: 200);
        } catch (\Throwable $e) {
            return response()->json(data: [
                'message' => 'Erro ao buscar usuário: ' . $e->getMessage(),
                'exception' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ], status: 500);
        }
    }

    // possivelmente irá ser inultilizada
    public function create(RegisterUserRequest $req, UserService $service): JsonResponse
    {
        try {
            $service->create($req->toDto());

            return response()->json(data: [], status: 201);
        } catch (\Throwable $e) {
            return response()->json(data: [
                'message' => 'Erro ao criar usuário: ' . $e->getMessage(),
                'exception' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ], status: 500);
        }
    }

    public function login(LoginUserRequest $req, UserService $service)
    {
        try {
            $user = $service->login($req->toDTO());
            $user = UserDto::make($user->toArray());

            return \response()->json([
                'message' => 'Usuário logado com sucesso!',
                'user' => $user->JsonSerialize(),
            ], 200);
        } catch (\Throwable $e) {

            return \response()->json(data: [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ], status: 500);
        }
    }

    public function update(UpdateUserRequest $req, UserService $service): JsonResponse
    {
        try {
            $service->update($req->toDTO());

            return \response()->json([], 201);
        } catch (\Throwable $e) {
            return \response()->json(data: [
                'message' => 'Erro ao atualizar usuário: ' . $e->getMessage(),
                'exception' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ], status: 500);
        }
    }
}
