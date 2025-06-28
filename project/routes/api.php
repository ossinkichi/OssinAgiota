<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

// User routes

Route::post('/user/login', UsersController::class . '@login');
Route::post('/user/register', UsersController::class . '@create');
Route::put('/user/update', UsersController::class . '@update');
