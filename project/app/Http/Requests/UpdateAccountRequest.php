<?php

namespace App\Http\Requests;

use App\DTOs\UpdateAccountDto;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAccountRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'account' => 'required|integer',
            'description' => 'nullable|string',
            'value' => 'required|numeric|min:0',
            'installments' => 'required|integer|min:1',
            'date_of_paid' => 'required|string|max:5',
            'tags' => 'nullable|array',
            'tags.*' => 'int', // Validação para cada tag individual
        ];
    }

    public function messages(): array
    {
        return [
            'account.required' => 'O campo account é obrigatório.',
            'account.integer' => 'O campo account deve ser um número inteiro.',
            'description.string' => 'A descrição deve ser uma string.',
            'value.required' => 'O campo valor é obrigatório.',
            'value.numeric' => 'O campo valor deve ser um número.',
            'value.min' => 'O valor deve ser maior ou igual a zero.',
            'installments.required' => 'O campo parcelas é obrigatório.',
            'installments.integer' => 'O campo parcelas deve ser um número inteiro.',
            'installments.min' => 'O número de parcelas deve ser pelo menos 1.',
            'date_of_paid.required' => 'O campo data de pagamento é obrigatório.',
            'date_of_paid.string' => 'O campo data de pagamento deve ser uma string.',
            'date_of_paid.max' => 'O campo data de pagamento não pode ter mais de 5 caracteres.',
            'tags.array' => 'O campo tags deve ser um array.',
            'tags.*.int' => 'Cada tag deve ser um número inteiro.',
        ];
    }

    public function toDTO()
    {
        return new UpdateAccountDto(
            id: $this->input('account'),
            description: $this->input('description'),
            value: $this->input('value'),
            installments: $this->input('installments'),
            dateOfPaid: $this->input('date_of_paid'),
            tags: $this->input('tags', [])
        );
    }
}
