<?php

namespace App\Http\Controllers;

use App\DTOs\RegisterExpensesDto;
use App\Services\ExpensesService;
use Illuminate\Routing\Controller;
use App\Exceptions\ControllerExceptions;
use App\Http\Requests\UpdateExpensesRequest;
use App\Http\Requests\RegisterExpensesRequest;


class ExpensesController extends Controller
{

    use ControllerExceptions;

    public function getAllExpenses(ExpensesService $service, int $user)
    {
        try {
            $expenses = $service->getAll($user);

            return response()->json(data: $expenses->map(fn($expense) => $expense->jsonSerialize()), status: 200);
        } catch (\Throwable $th) {
            return ControllerExceptions::fromMessage($th);
        }
    }

    public function create(RegisterExpensesRequest $req, ExpensesService $service)
    {
        try {
            $expenses = $this->repeatExpense($req->toDTO());

            $service->create($expenses);

            return \response()->json(data: [], status: 201);
        } catch (\Throwable $th) {
            return ControllerExceptions::fromMessage($th);
        }
    }

    public function update(UpdateExpensesRequest $req, ExpensesService $service)
    {
        try {
            $service->update($req->toDTO());

            return \response()->json(data: [])->status(201);
        } catch (\Throwable $th) {
            return ControllerExceptions::fromMessage($th);
        }
    }

    public function pay(int $user, int $expense, ExpensesService $service)
    {
        try {
            $service->pay(user: $user, expense: $expense);

            return \response()->json(data: [], status: 201);
        } catch (\Throwable $th) {
            return ControllerExceptions::fromMessage($th);
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
