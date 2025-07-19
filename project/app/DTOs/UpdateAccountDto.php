<?php

namespace App\DTOs;

class UpdateAccountDto
{
    public function __construct(
        public int $id,
        public ?string $description,
        public string $value,
        public int $installments,
        public string $dateOfPaid,
        public ?string $status = 'pendente',
        public ?array $tags = []
    ) {}
}
