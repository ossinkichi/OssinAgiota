<?php

namespace App\DTOs;

class UpdateExpenseDto
{
    public function __construct(
        public int $id,
        public int $user_id,
        public float $amount,
        public string $description,
        public ?string $observation = null,
        public ?array $tags = [],
    ) {}
}
