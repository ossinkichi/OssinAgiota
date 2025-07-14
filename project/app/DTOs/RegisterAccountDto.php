<?php

namespace App\DTOs;

class RegisterAccountDto
{
    public function __construct(
        public int $clientId,
        public ?string $description = null,
        public string $value,
        public int $installments = 1,
        public string $date_of_paid,
        public ?string $status = 'pendente',
        public ?array $tags = []
    ) {}
}
