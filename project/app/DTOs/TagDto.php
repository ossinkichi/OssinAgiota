<?php

namespace App\DTOs;

class TagDto
{
    public function __construct(
        public int $id,
        public string $name,
        public string $color,
        public string $background,
    ) {}

    public static function make(array $tag): self
    {
        return new self(
            id: $tag['id'],
            name: $tag['name'],
            color: $tag['color'],
            background: $tag['background'],
        );
    }

    public function JsonSerialize(): array
    {
        return get_object_vars($this);
    }
}
