<?php

namespace App\Entities;

class UserEntity
{

    public function __construct(
        public int $id,
        public string $name,
        public ?string $email = null,
        public ?string $email_verified_at = null,
        public string $created_at = '',
        public string $updated_at = '',
    ) {}

    public function make(array $model): self
    {
        return new self(
            id: $model['id'],
            name: $model['name'],
            email: $model['email'] ?? null,
            email_verified_at: $model['email_verified_at'] ?? null,
            created_at: $model['created_at'] ?? '',
            updated_at: $model['updated_at'] ?? '',
        );
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
