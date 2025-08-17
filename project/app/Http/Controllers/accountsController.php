<?php

namespace App\Http\Controllers;

use App\DTOs\AccountDto;
use App\DTOs\RegisterAccountDto;
use App\Http\Requests\PaidAccountRequest;
use App\Http\Requests\RegisterAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use App\Services\AccountService;
use Illuminate\Http\JsonResponse;

class AccountsController extends Controller
{
    public function getAllAccountsOfClient(int $client, AccountService $service): JsonResponse
    {
        try {
            $response = $service->getAll(clientId: $client);

            return \response()->json(data: [
                'message' => 'Contas encontradas.',
                'data' => $response->map(fn($account) => $account->JsonSerialize()),
            ], status: 200);
        } catch (\Throwable $e) {
            return \response()->json(data: [
                'error' => 'Erro ao buscar contas',
                'exception' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ], status: 422);
        }
    }

    public function create(RegisterAccountRequest $req, AccountService $service)
    {
        try {
            $service->create($req->toDTO());

            return \response()->json(data: [], status: 201);
        } catch (\Throwable $e) {
            return \response()->json(data: [
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
            ], status: 422);
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
            ], status: 422);
        }
    }

    private function createAccounts(RegisterAccountDto $account)
    {
        $accounts = [];
        for ($i = 0; $i < $account->installments; $i++) {
            $accounts[] = [
                'client_id' => $account->clientId,
                'description' => $account->description,
                'value' => round($account->value / $account->installments, 2),
                'installment' => '1/' . ($i + 1),
                'date_of_paid' => now()->addMonths($i),
                'status' => 'pending',
                'tags' => json_encode($account->tags ?? [])
            ];
        }
    }
}
