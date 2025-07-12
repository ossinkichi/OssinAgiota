<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaidAccountRequest;
use App\Http\Requests\PushAccountRequest;
use App\Http\Requests\RegisterAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use App\Services\AccountService;

class AccountsController extends Controller
{
    public function pushAllAccountOfClient(int $client, AccountService $service) {}

    public function create(RegisterAccountRequest $req, AccountService $service) {}

    public function update(UpdateAccountRequest $req,  AccountService $service) {}

    public function paid(PaidAccountRequest $req, AccountService $service) {}
}
