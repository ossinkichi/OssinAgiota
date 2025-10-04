<?php

namespace App\DTOs;

class RegisterTagDto
{
    public function __construct(
        public string $name,
        public ?string $description,
        public ?string $text,
        public ?string $background,
    ) {}
}
