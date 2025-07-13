<?php

namespace App\DTOs;

class PaidAccountDto
{
    public function __construct(
        public int $id,
        public int $client,
        public string $paidValue,
        public int $installemntsPaid,
        public string $status,
    ) {}
}
