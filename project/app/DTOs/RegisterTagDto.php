<?php

namespace App\DTOs;

class RegisterTagDto
{
    public function __construct(
        public string $name,
        public ?string $description = null,
        public ?string $text = null,
        public ?string $background = null,
    ) {}
}
