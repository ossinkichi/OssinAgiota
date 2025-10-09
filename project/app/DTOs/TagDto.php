<?php

namespace App\DTOs;

class TagDto
{
    public function __construct(
        public int $id,
        public string $name,
        public ?string $description,
        public string $color,
        public string $background,
    ) {}

    public static function make(array $tag): self
    {
        return new self(
            id: $tag['id'],
            name: $tag['name'],
            description: $tag['description'],
            color: $tag['color-text'],
            background: $tag['color-background'],
        );
    }

    public function JsonSerialize(): array
    {
        return get_object_vars($this);
    }
}
