<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

// User routes
Route::get('/user/show/{id}', UsersController::class . '@show');
Route::post('/user/register', UsersController::class . '@create');
Route::post('/user/login', UsersController::class . '@login');
Route::put('/user/update', UsersController::class . '@update');
