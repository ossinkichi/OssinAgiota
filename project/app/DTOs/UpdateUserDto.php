<?php

namespace App\DTOs;

class UpdateUserDto
{
    public function __construct(
        public int $id,
        public string $name,
        public ?string $email = null,
    ) {}
}
