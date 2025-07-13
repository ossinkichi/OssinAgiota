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
            'id' => 'required|integer',
            'client' => 'required|integer|exists:clients,id',
            'description' => 'nullable|string',
            'value' => 'required|numeric|min:0',
            'installments' => 'required|integer|min:1',
            'date_of_paid' => 'required|string',
            'status' => 'required|string|in:pendente,pago,atrasado',
            'tags' => 'nullable|array',
            'tags.*' => 'string', // Validação para cada tag individual
        ];
    }

    public function messages(): array
    {
        return [
            'id.required' => 'O campo ID é obrigatório.',
            'id.integer' => 'O campo ID deve ser um número inteiro.',
            'client.required' => 'O campo cliente é obrigatório.',
            'client.integer' => 'O campo cliente deve ser um número inteiro.',
            'client.exists' => 'O cliente informado não existe.',
            'description.string' => 'A descrição deve ser uma string.',
            'value.required' => 'O campo valor é obrigatório.',
            'value.numeric' => 'O campo valor deve ser um número.',
            'value.min' => 'O valor deve ser maior ou igual a zero.',
            'installments.required' => 'O campo parcelas é obrigatório.',
            'installments.integer' => 'O campo parcelas deve ser um número inteiro.',
            'installments.min' => 'O número de parcelas deve ser pelo menos 1.',
            'date_of_paid.required' => 'O campo data de pagamento é obrigatório.',

        ];
    }

    public function toDTO()
    {
        return new UpdateAccountDto(
            id: $this->route('id'),
            client: $this->input('client'),
            description: $this->input('description'),
            value: $this->input('value'),
            installments: $this->input('installments'),
            dateOfPaid: $this->input('date_of_paid'),
            status: $this->input('status'),
            tags: $this->input('tags', [])
        );
    }
}
