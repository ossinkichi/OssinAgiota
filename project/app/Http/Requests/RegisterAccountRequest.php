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
            'date_of_paid' => 'required|integer',
            'paid_value' => 'required|numeric|min:0',
            'installemnts_paid' => 'required|integer|min:0',
            'status' => 'required|string|in:pendente,pago,atrasado',
            'tags' => 'nullable|array',
            'tags.*' => 'string', // Validação para cada tag individual
        ];
    }

    public function messages(): array
    {
        return [
            'client.required' => 'O campo cliente é obrigatório.',
            'client.integer' => 'O campo cliente deve ser um número inteiro.',
            'client.exists' => 'O cliente selecionado não existe.',
            'description.string' => 'A descrição deve ser uma string.',
            'value.required' => 'O campo valor é obrigatório.',
            'value.numeric' => 'O valor deve ser um número.',
            'value.min' => 'O valor não pode ser negativo.',
            'installments.required' => 'O campo parcelas é obrigatório.',
            'installments.integer' => 'O número de parcelas deve ser um inteiro.',
            'installments.min' => 'O número de parcelas deve ser pelo menos 1.',
            'date_of_paid.required' => 'A data de pagamento é obrigatória.',
            'date_of_paid.integer' => 'A data de pagamento deve ser um número inteiro.',
            'paid_value.required' => 'O valor pago é obrigatório.',
            'paid_value.numeric' => 'O valor pago deve ser um número.',
            'paid_value.min' => 'O valor pago não pode ser negativo.',
            'installemnts_paid.required' => 'O número de parcelas pagas é obrigatório.',
            'installemnts_paid.integer' => 'O número de parcelas pagas deve ser um inteiro.',
            'installemnts_paid.min' => 'O número de parcelas pagas não pode ser negativo.',
            'status.required' => 'O status é obrigatório.',
            'status.string' => 'O status deve ser uma string.',
            'status.in' => 'O status deve ser pendente, pago ou atrasado.',
            'tags.array' => 'As tags devem ser um array.',
            'tags.*.string' => 'Cada tag deve ser uma string.'
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
            paid_value: $this->input('paid_value'),
            installemnts_paid: $this->input('installemnts_paid'),
            status: $this->input('status'),
            tags: $this->input('tags')
        );
    }
}
