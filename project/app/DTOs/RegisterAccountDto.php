<?php

namespace App\DTOs;

class RegisterAccountDto
{
    public function __construct(
        public int $clientId,
        public ?string $description = null,
        public string $value,
        public int $installments = 1,
        public string $due_date,
        public ?string $status = 'pending',
        public ?array $tags = []
    ) {}
}
