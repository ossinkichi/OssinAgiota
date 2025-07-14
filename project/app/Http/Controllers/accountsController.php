<?php

namespace App\Http\Controllers;

use App\DTOs\AccountDto;
use App\Http\Requests\PaidAccountRequest;
use App\Http\Requests\GetAccountRequest;
use App\Http\Requests\RegisterAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use App\Services\AccountService;
use Illuminate\Http\JsonResponse;
use PDO;

class AccountsController extends Controller
{
    public function getAllAccountsOfClient(int $client, AccountService $service): JsonResponse
    {
        try {
            $response = $service->get(clientId: $client);

            $accounts = $response->map(fn($account) => AccountDto::make($account->toArray()));

            return \response()->json(data: [
                'message' => 'Contas encontradas.',
                'data' => $accounts->map(fn($account) => $account->JsonSerialize()),
            ], status: 200);
        } catch (\Throwable $e) {
            return \response()->json(data: [
                'error' => 'Erro ao buscar contas',
                'exception' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ], status: 500);
        }
    }

    public function create(RegisterAccountRequest $req, AccountService $service)
    {
        try {
            $service->create($req->toDTO());

            return \response()->json(data: [], status: 201);
        } catch (\Throwable $e) {
            return \response()->json(data: [
                'error' => 'Erro ao cadastrar a conta',
                'exception' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ], status: 422);
        }
    }

    public function update(UpdateAccountRequest $req,  AccountService $service)
    {
        try {
            $service->update($req->toDTO());

            return \response()->json(data: [], status: 201);
        } catch (\Throwable $e) {
            return \response()->json(data: [
                'error' => 'Erro ao atualizar a conta',
                'exception' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ], status: 500);
        }
    }

    public function paid(PaidAccountRequest $req, AccountService $service)
    {
        try {
            $service->paid($req->toDTO());

            return \response()->json(data: [], status: 201);
        } catch (\Throwable $e) {
            return \response()->json(data: [
                'error' => 'Erro ao marcar a conta como paga',
                'exception' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ], status: 500);
        }
    }
}
