<?php

namespace App\DTOs;

use DateTime;

class AccountDto
{
    public function __construct(
        public int $id,
        public int $client_id,
        public ?string $description = null,
        public string $value,
        public int $installments,
        public string $date_of_paid,
        public ?string $paid_value = '0,00',
        public ?int $installemnts_paid = 0,
        public string $status = 'pendente',
        public string $tags = '[]',
        public ?string $created_at = null,
        public ?string $updated_at = null
    ) {}

    public static function make(array $account): self
    {
        return new self(
            id: $account['id'],
            client_id: $account['client_id'],
            description: $account['description'] ?? null,
            value: $account['value'],
            installments: $account['installments'],
            date_of_paid: $account['date_of_paid'],
            paid_value: $account['paid_value'],
            installemnts_paid: $account['installemnts_paid'],
            status: $account['status'] ?? 'pendente',
            tags: $account['tags'] ?? null,
            created_at: $account['created_at'] ?? null,
            updated_at: $account['updated_at'] ?? null
        );
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'client_id' => $this->client_id,
            'description' => $this->description,
            'value' => $this->value,
            'installments' => $this->installments,
            'date_of_paid' => $this->date_of_paid,
            'paid_value' => $this->paid_value,
            'installemnts_paid' => $this->installemnts_paid,
            'status' => $this->status,
            'tags' => \json_decode($this->tags, true),
            'created_at' => self::isDateTime($this->created_at),
            'updated_at' => self::isDateTime($this->updated_at)
        ];
    }

    public static function isDateTime($string)
    {
        try {
            $date = new DateTime($string);
            return $date->format('Y/m/d');
        } catch (\Throwable $th) {
            return $string;
        }
    }
}
