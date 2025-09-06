<?php

namespace App\DTOs;

class RegisterExpensesDto
{
    public function __construct(
        public int $user,
        public string $description,
        public ?string $observation,
        public string $amount,
        public string $expense_date,
        public ?bool $fixed = false,
        public ?array $tags = null,
    ) {}
}
