<?php

namespace App\DTOs;

use DateTime;

class UserDto
{
    public function __construct(
        public string $id,
        public string $name,
        public ?string $email = null,
        public ?string $email_verified = null,
        public string $created_at,
        public string $updated_at
    ) {}

    public static function make(array $user): self
    {
        return new self(
            id: $user['id'],
            name: $user['name'],
            email: $user['email'],
            email_verified: $user['email_verified'],
            created_at: self::isDateTime($user['created_at']),
            updated_at: self::isDateTime($user['updated_at'])
        );
    }

    public function JsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'email_verified' => self::isDateTime($this->email_verified),
            'created_at' => self::isDateTime($this->created_at),
            'updated_at' => self::isDateTime($this->updated_at)
        ];
    }

    public static function isDateTime($param)
    {
        try {
            $date = new DateTime($param);
            return $date->format('Y/m/d');
        } catch (\Throwable $th) {
            return $param;
        }
    }
}
