<?php

namespace App\DTOs;

class RegisterClientDto
{
    public function __construct(
        public string $name,
        public ?string $email,
        public ?string $phone_1,
        public ?string $phone_2,
        public ?string $address,
        public ?string $observation,
        public ?array $tags = [],
    ) {}
}
