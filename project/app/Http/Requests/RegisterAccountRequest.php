<?php

namespace App\Http\Requests;

use App\DTOs\RegisterUserDto;
use App\DTOs\RegisterAccountDto;
use Illuminate\Foundation\Http\FormRequest;

class RegisterAccountRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'client' => 'required|integer|exists:clients,id',
            'description' => 'nullable|string',
            'value' => 'required|numeric|min:0',
            'installments' => 'required|integer|min:1',
            'date_of_paid' => 'required|string',
            'tags' => 'nullable|array',
            'tags.*' => 'int', // Validação para cada tag individual
        ];
    }

    public function messages(): array
    {
        return [
            'client.required' => 'O campo cliente é obrigatório.',
            'client.string' => 'O campo cliente deve ser uma string.',
            'client.exists' => 'O cliente selecionado não existe.',
            'description.string' => 'A descrição deve ser uma string.',
            'value.required' => 'O campo valor é obrigatório.',
            'value.min' => 'O valor não pode ser negativo.',
            'installments.required' => 'O campo parcelas é obrigatório.',
            'installments.integer' => 'O número de parcelas deve ser um inteiro.',
            'installments.min' => 'O número de parcelas deve ser pelo menos 1.',
            'date_of_paid.required' => 'A data de pagamento é obrigatória.',
            'date_of_paid.string' => 'A data de pagamento deve ser uma string.',
            'tags.array' => 'As tags devem ser um array.',
            'tags.*.int' => 'Cada tag deve ser um inteiro.'
        ];
    }

    public function toDTO()
    {
        return new RegisterAccountDto(
            clientId: $this->input('client'),
            description: $this->input('description'),
            value: $this->input('value'),
            installments: $this->input('installments'),
            date_of_paid: $this->input('date_of_paid'),
            tags: $this->input('tags')
        );
    }
}
