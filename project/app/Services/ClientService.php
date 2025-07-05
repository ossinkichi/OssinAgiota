<?php

namespace App\Services;

use App\DTOs\ClientDto;
use App\DTOs\RegisterClientDto;
use App\DTOs\UpdateClientDto;
use App\Models\Clients;

class ClientService
{
    public function getAll()
    {
        return Clients::all()->map(fn($client) => ClientDto::make($client->toArray()));
    }

    public function register(RegisterClientDto $client)
    {
        Clients::create([
            'name' => $client->name,
            'email' => $client->email,
            'phone_1' => $client->phone_1,
            'phone_2' => $client->phone_2,
            'address' => $client->address,
            'observation' => $client->observation,
            'tags' => json_encode($client->tags ?? []),
        ]);
    }

    public function update(UpdateClientDto $client) {
        Clients::where('id', $client->id)->update([
            'name' => $client->name,
            'email' => $client->email,
            'phone_1' => $client->phone_1,
            'phone_2' => $client->phone_2,
            'address' => $client->address,
            'observation' => $client->observation,
            'tags' => json_encode($client->tags ?? []),
        ]);
    }
}
