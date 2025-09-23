<?php

namespace App\Services;

use App\DTOs\ExpensesDto;
use App\DTOs\RegisterExpensesDto;
use App\DTOs\UpdateExpenseDto;
use App\Models\Expenses;

class ExpensesService
{
    public function getAll(int $user)
    {
        $expenses = Expenses::where('user_id', $user)->get();

        return $expenses->map(fn($expense) => ExpensesDto::make($expense->toArray()));
    }

    public function create(array $expenses)
    {
        Expenses::insert($expenses);
    }

    public function update(UpdateExpenseDto $expense)
    {
        Expenses::where('id', $expense->id)->where('user_id', $expense->user_id)->update([
            'amount' => $expense->amount,
            'description' => $expense->description,
            'observation' => $expense->observation,
            'tags' => $expense->tags,
        ]);
    }

    public function pay(int $user, int $expense)
    {
        $model = Expenses::where('user_id', $user)->where('id', $expense)->firstOrFail();

        $model->paid = true;
        $model->save();
    }
}
