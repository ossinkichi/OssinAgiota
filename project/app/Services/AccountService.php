<?php

namespace App\Services;

use App\DTOs\PaidAccountDto;
use App\DTOs\RegisterAccountDto;
use App\DTOs\UpdateAccountDto;
use App\Http\Requests\PaidAccountRequest;
use App\Models\Accounts;
use Illuminate\Database\Eloquent\Collection;
use Tests\Feature\accountTest;

class AccountService
{

    public function getAll(int $clientId): Collection
    {
        return Accounts::where('client_id', $clientId)->get();
    }

    public function create(RegisterAccountDto $dto): void
    {
        Accounts::create([
            'client_id' => $dto->clientId,
            'description' => $dto->description,
            'value' => $dto->value,
            'installments' => $dto->installments,
            'date_of_paid' => $dto->date_of_paid,
            'status' => $dto->status,
            'tags' => json_encode($dto->tags ?? [])
        ]);
    }

    public function update(UpdateAccountDto $dto): void
    {
        Accounts::where('id', $dto->id)->update([
            'description' => $dto->description,
            'value' => $dto->value,
            'installments' => $dto->installments,
            'date_of_paid' => $dto->dateOfPaid,
            'tags' => json_encode($dto->tags)
        ]);
    }

    public function paid(PaidAccountDto $dto): Accounts
    {
        Accounts::where('id', $dto->id)->where('client_id', $dto->client)->update([
            'paid_value' => $dto->paidValue,
            'installemnts_paid' => $dto->installemntsPaid,
            'status' => $dto->status,
        ]);

        return Accounts::findOrFail($dto->id)->first();
    }
}
