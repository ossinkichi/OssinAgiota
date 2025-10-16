<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\TagsController;

// User routes
Route::get('/user/show/{id}', UsersController::class . '@show');
Route::post('/user/register', UsersController::class . '@create');
Route::post('/user/login', UsersController::class . '@login');
Route::put('/user/update', UsersController::class . '@update');

// Client routes
Route::get('/clients', ClientsController::class . '@list');
Route::post('/client/register', ClientsController::class . '@create');
Route::put('/client/update', ClientsController::class . '@update');

// Account routes
Route::post('/accounts/create', AccountsController::class . '@create');
Route::put('/accounts/update', AccountsController::class . '@update');
Route::put('/accounts/pay', AccountsController::class . '@paid');
Route::get('/accounts/{client}', AccountsController::class . '@getAllAccountsOfClient');

// Expenses routes
Route::get('/expenses/{client}', ExpensesController::class . '@getAllExpenses');
Route::post('/expenses/register', ExpensesController::class . '@create');
Route::put('/expenses/update', ExpensesController::class . '@update');
Route::patch('/expenses/pay/{user}/{expense}', ExpensesController::class . '@pay');

// Tags routes
Route::get('/tags', TagsController::class . '@getAll');
Route::post('/tag/register', TagsController::class . '@create');
Route::put('/tag/delete/{tag}', TagsController::class . '@delete');
