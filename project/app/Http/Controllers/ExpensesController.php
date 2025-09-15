<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\DTOs\RegisterExpensesDto;
use App\Services\ExpensesService;
use App\Http\Requests\PayExpensesRequest;
use App\Http\Requests\RegisterExpensesRequest;

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
            $expenses = $this->repeatExpense($req->toDTO());

            $service->create($expenses);

            return \response()->json(data: [], status: 201);
        } catch (\Throwable $e) {
        }
    }

    public function update() {}

    public function pay($req, ExpensesService $service)
    {
        try {
            $service->pay($req->toDto);

            return \response()->json(data: [], status: 201);
        } catch (\Throwable $th) {
            return \response()->json(data: ['error' => $th->getMessage()], status: 500);
        }
    }

    private function repeatExpense(RegisterExpensesDto $expenses)
    {
        if ($expenses->repeat <= 1) {
            return [$expenses];
        }
        $repeats = [];
        for ($i = 0; $i < $expenses->repeat; $i++) {
            $repeats[] =
                [
                    'user' => $expenses->user,
                    'description' => $expenses->description . ' - (' . ($i + 1) . '/' . $expenses->repeat . ')',
                    'observation' => $expenses->observation,
                    'amount' => $expenses->amount,
                    'expense_date' => date('Y-m-d', strtotime($expenses->expense_date . ' + ' . $i . ' month')),
                    'fixed' => $expenses->fixed,
                    'tags' => $expenses->tags,
                ];
        }

        return $repeats;
    }
}
