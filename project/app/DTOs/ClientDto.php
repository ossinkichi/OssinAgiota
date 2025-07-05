<?php

namespace App\DTOs;

class ClientDto
{
    public function __construct(
        public int $id,
        public string $name,
        public ?string $email,
        public ?string $phone_1,
        public ?string $phone_2,
        public ?string $address,
        public ?string $observation,
        public ?array $tags = []
    ) {}

    public static function make(array $client): self
    {
        return new self(
            id: $client['id'],
            name: $client['name'],
            email: $client['email'],
            phone_1: $client['phone_1'],
            phone_2: $client['phone_2'],
            address: $client['address'],
            observation: $client['observation'],
            tags: \json_decode($client['tags'] ?? '[]', \true)
        );
    }

    public function JsonSerialize():array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone_1' => $this->phone_1,
            'phone_2' => $this->phone_2,
            'address' => $this->address,
            'observation' => $this->observation,
            'tags' => \json_decode($this->tags ?? '[]', \true)
        ];
    }
}
