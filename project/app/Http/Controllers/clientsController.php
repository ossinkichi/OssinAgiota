<?php

namespace App\Http\Controllers;

use App\DTOs\ClientDto;
use App\Http\Requests\RegisterClientRequest;
use App\Services\ClientService;

use function PHPSTORM_META\map;

class ClientsController extends Controller
{

    public function list(ClientService $service)
    {
        $response = $service->getAll();

        if (!$response) {
            return \response(content: ['message' => 'Nenhum cliente encontrado.'], status: 404);
        }
        return \response()->json(data: [
            'message' => 'Clientes encontrados.',
            'data' => $response->map(fn($client) => $client->JsonSerialize())
        ], status: 200);
    }

    public function create(RegisterClientRequest $req, ClientService $service)
    {
        $response = $service->register($req->toDTO());

        if (!$response) {
            return \response(content: ['message' => 'Erro ao cadastrar cliente.'], status: '422');
        }

        return \response()->json(data: [], status: 201);
    }

    public function update() {}

    public function delete() {}
}
