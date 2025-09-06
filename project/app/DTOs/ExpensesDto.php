<?php

namespace App\DTOs;

class ExpensesDto
{
    public function __construct(
        public int $id,
        public string $name,
        public float $amount,
        public string $expense_date,
        public ?string $description = null,
        public ?array $tags = [],
        public ?string $created_at = null,
        public ?string $updated_at = null,
    ) {}

    public static function make(): self
    {
        return new self(
            id: $this->id,
            name: $this->name,
            amount: $this->amount,
            expense_date: $this->expense_date,
            description: $this->description,
            tags: $this->tags,
            created_at: $this->created_at,
            updated_at: $this->updated_at,
        );
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}
