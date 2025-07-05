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
        $response = $service->getAll();

        if (!$response) {
            return \response()->json(data: ['message' => 'Nenhum cliente encontrado.'], status: 404);
        }
        return \response()->json(data: [
            'message' => 'Clientes encontrados.',
            'data' => $response->map(fn($client) => $client->JsonSerialize())
        ], status: 200);
    }

    public function create(RegisterClientRequest $req, ClientService $service): JsonResponse
    {
        $response = $service->register($req->toDTO());

        if (!$response) {
            return \response()->json(data: ['message' => 'Erro ao cadastrar cliente.'], status: '422');
        }

        return \response()->json(data: [], status: 201);
    }

    public function update(UpdateClientRequest $req, ClientService $service):JsonResponse {
        $response = $service->update($req->toDTO());

        if(!$response){
            return \response()->json(data: [ 'message' => 'Não foi possivel atualizar os dados do client.'], status:422);
        }

        return \response()->json(data:[],status:201);
    }
}
