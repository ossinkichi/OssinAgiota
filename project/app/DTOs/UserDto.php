<?php

namespace App\DTOs;

class UserDto
{
    public function __construct(
        public string $name,
        public ?string $email = null,
        public string $password,
        public ?string $password_confirmation = null
    ) {}
}
