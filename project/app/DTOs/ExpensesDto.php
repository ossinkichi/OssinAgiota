<?php

namespace App\DTOs;

class ExpensesDto
{
    public function __construct(
        public int $id,
        public int $user_id,
        public float $amount,
        public string $expense_date,
        public string $description,
        public ?string $observation = null,
        public bool $fixed,
        public bool $paid,
        public ?array $tags = [],
        public ?string $created_at = null,
        public ?string $updated_at = null,
    ) {}

    public static function make(): self
    {
        return new self(
            id: self::$id,
            user_id: self::$user_id,
            amount: self::$amount,
            expense_date: self::$expense_date,
            description: self::$description,
            observation: self::$observation,
            fixed: self::$fixed,
            paid: self::$paid,
            tags: self::$tags,
            created_at: self::$created_at,
            updated_at: self::$updated_at,
        );
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}
