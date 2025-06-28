<?php

namespace App\DTOs;

class LoginUserDto
{
    public function __construct(
        public string $user,
        public string $password
    ) {}
}
