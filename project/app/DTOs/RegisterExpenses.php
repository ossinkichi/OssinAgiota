<?php

namespace App\DTOs;

class RegisterExpenses
{
    public function __construct(
        public string $description
    ) {}
}
