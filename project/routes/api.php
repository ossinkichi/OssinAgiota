<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\AccountsController;

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
Route::get('/accounts/{client}', AccountsController::class . ' @getAllAccountsOfClient');
Route::post('/accounts/create', AccountsController::class . '@create');
Route::put('/accounts/update', AccountsController::class . '@update');
Route::put('/accounts/pay', AccountsController::class . '@paid');
