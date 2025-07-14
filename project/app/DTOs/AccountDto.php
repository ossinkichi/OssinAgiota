<?php

namespace App\DTOs;

class AccountDto
{
    public function __construct(
        public int $id,
        public int $client_id,
        public ?string $description = null,
        public string $value = '0,00',
        public int $installments = 1,
        public string $date_of_paid,
        public string $paid_value = '0,00',
        public int $installemnts_paid = 0,
        public string $status = 'pendente',
        public ?array $tags = [],
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
            'tags' => $this->tags,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
