<?php

namespace App\Http\Controllers;

use App\DTOs\ClientDto;
use App\Http\Requests\RegisterClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Services\ClientService;
use Illuminate\Http\JsonResponse;

class ClientsController extends Controller
{

    public function list(ClientService $service): JsonResponse
    {
        try {

            $response = $service->getAll();

            return \response()->json(data: [
                'message' => 'Clientes encontrados.',
                'data' => $response->map(fn($client) => $client->JsonSerialize())
            ], status: 200);
        } catch (\Throwable $e) {
            return \response()->json(data: [
                'error' => 'Erro ao buscar clientes',
                'exception' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ], status: '500');
        }
    }

    public function create(RegisterClientRequest $req, ClientService $service): JsonResponse
    {
        try {
            $response = $service->register($req->toDTO());

            return \response()->json(data: [], status: 201);
        } catch (\Throwable $e) {
            return \response()->json(data: [
                'error' => 'Erro ao cadastrar o cliente',
                'exception' => $e->getMessage(),
                'file' => $e->getFile()
            ], status: '500');
        }
    }

    public function update(UpdateClientRequest $req, ClientService $service): JsonResponse
    {

        try {
            $response = $service->update($req->toDTO());

            return \response()->json(data: [], status: 201);
        } catch (\Throwable $e) {
            return \response()->json(data: [
                'error' => 'Erro ao atualizar o cliente',
                'exception' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ], status: '500');
        }
    }
}
