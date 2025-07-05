<?php

namespace App\DTOs;

class UpdateClientDto
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
}
