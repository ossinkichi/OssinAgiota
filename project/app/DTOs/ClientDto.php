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
            tags: is_string($client['tags']) ? json_decode($client['tags'], true) : $client['tags'],
        );
    }

    public function JsonSerialize(): array
    {
        return get_object_vars($this);
    }
}
