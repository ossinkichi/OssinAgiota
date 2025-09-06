<?php

namespace App\Http\Controllers;

use App\Http\Requests\PayExpensesRequest;
use App\Http\Requests\RegisterExpensesRequest;
use App\Services\ExpensesService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ExpensesController extends Controller
{
    public function getAllExpenses(ExpensesService $service, int $user)
    {
        try {
            $expenses = $service->getAll($user);

            return response()->json(data: $expenses->map(fn($expense) => $expense->jsonSerialize()), status: 200);
        } catch (\Throwable $e) {
            return response()->json(data: ['error' => $e->getMessage()], status: 500);
        }
    }

    public function create(RegisterExpensesRequest $req, ExpensesService $service)
    {
        try {
            $service->create($req->toDTO());

            return \response()->json(data: [], status: 201);
        } catch (\Throwable $e) {
        }
    }

    public function update() {}

    public function pay(PayExpensesRequest $req, ExpensesService $service)
    {
        try {
            $service->pay($req->toDto);

            return \response()->json(data: [], status: 201);
        } catch (\Throwable $th) {
            return \response()->json(data: ['error' => $th->getMessage()], status: 500);
        }
    }
}
