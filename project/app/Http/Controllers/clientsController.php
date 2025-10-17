<?php

namespace App\Http\Controllers;

use App\Exceptions\ControllerExceptions;
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
        } catch (\Throwable $th) {
            return ControllerExceptions::fromMessage($th);
        }
    }

    public function create(RegisterClientRequest $req, ClientService $service): JsonResponse
    {
        try {
            $service->register($req->toDTO());

            return \response()->json(data: [], status: 201);
        } catch (\Throwable $th) {
            return ControllerExceptions::fromMessage($th);
        }
    }

    public function update(UpdateClientRequest $req, ClientService $service): JsonResponse
    {

        try {
            $response = $service->update($req->toDTO());

            return \response()->json(data: [], status: 201);
        } catch (\Throwable $th) {
            return ControllerExceptions::fromMessage($th);
        }
    }
}
