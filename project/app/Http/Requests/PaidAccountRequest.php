<?php

namespace App\Http\Requests;

use App\DTOs\PaidAccountDto;
use Illuminate\Foundation\Http\FormRequest;

class PaidAccountRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => 'required|integer|exists:accounts,id',
            'client' => 'required|integer|exists:accounts,client_id',
            'paidValue' => 'required|numeric|min:0',
            'installemntsPaid' => 'required|integer|min:1',
            'status' => 'required|string|in:pendente,pago,atrasado',
        ];
    }

    public function messages(): array
    {
        return [
            'id.required' => 'O campo ID é obrigatório.',
            'id.integer' => 'O campo ID deve ser um número inteiro.',
            'id.exists' => 'A conta com o ID especificado não existe.',
            'client.required' => 'O campo cliente é obrigatório.',
            'client.integer' => 'O campo cliente deve ser um número inteiro.',
            'client.exists' => 'O cliente especificado não existe.',
            'paidValue.required' => 'O valor pago é obrigatório.',
            'paidValue.numeric' => 'O valor pago deve ser um número.',
            'paidValue.min' => 'O valor pago deve ser maior ou igual a zero.',
            'installemntsPaid.required' => 'O número de parcelas pagas é obrigatório.',
            'installemntsPaid.integer' => 'O número de parcelas pagas deve ser um número inteiro.',
            'installemntsPaid.min' => 'O número de parcelas pagas deve ser pelo menos 1.',
            'status.required' => 'O status é obrigatório.',
            'status.string' => 'O status deve ser uma string.',
            'status.in' => 'O status deve ser um dos seguintes: pendente, pago, atrasado.'
        ];
    }

    public function toDTO()
    {
        return new PaidAccountDto(
            id: $this->input('id'),
            client: $this->input('client'),
            paidValue: $this->input('paidValue'),
            installemntsPaid: $this->input('installemntsPaid'),
            status: $this->input('status')
        );
    }
}
