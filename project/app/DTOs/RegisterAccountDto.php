<?php

namespace App\DTOs;

class RegisterAccountDto
{
    public function __construct(
        public int $clientId,
        public ?string $description = null,
        public ?string $value = '0,00',
        public int $installments = 1,
        public int $date_of_paid,
        public ?string $paid_value = '0,00',
        public ?int $installemnts_paid = 0,
        public string $status = 'pendente',
        public ?array $tags = []
    ) {}
}
