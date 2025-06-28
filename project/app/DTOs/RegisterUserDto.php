<?php

namespace App\DTOs;

class RegisterUserDto
{
    public function __construct(
        public string $name,
        public ?string $email = null,
        public string $password
    ) {}
}
