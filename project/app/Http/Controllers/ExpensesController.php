<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterExpensesRequest;
use App\Services\ExpensesService;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    public function getAllExpenses()
    {
        // Logic to retrieve all expenses
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

    public function pay() {}
}
