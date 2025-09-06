<?php

namespace App\Services;

use App\DTOs\ExpensesDto;
use App\DTOs\RegisterExpensesDto;
use App\Models\Expenses;

class ExpensesService
{
    public function getAll(int $user)
    {
        $expenses = Expenses::where('user_id', $user)->get();

        return $expenses->map(fn($expense) => ExpensesDto::make($expense->toArray()));
    }

    public function create(RegisterExpensesDto $expensesDto)
    {
        Expenses::insert([]);
    }
    public function update() {}
    public function pay() {}
}
