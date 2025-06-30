<?php

namespace App\DTOs;

use DateTime;

class UserDto
{
    public function __construct(
        public string $id,
        public string $name,
        public string $email,
        public ?string $email_verified_at = null,
        public DateTime $created_at,
        public DateTime $updated_at
    ) {}

    public static function make(array $user): self
    {
        return new self(
            id: $user['id'],
            name: $user['name'],
            email: $user['email'],
            email_verified_at: $user['email_verified_at'] ?? null,
            created_at: new DateTime($user['created_at']),
            updated_at: new DateTime($user['updated_at'])
        );
    }

    public function JsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'email_verified_at' => self::isDateTime($this->email_verified_at),
            'created_at' => self::isDateTime($this->created_at),
            'updated_at' => self::isDateTime($this->updated_at)
        ];
    }

    public static function isDateTime($param)
    {
        try {
            $date = new DateTime($param);
            return $date->format('Y-m-d');
        } catch (\Throwable $th) {
            return $param;
        }
    }
}
