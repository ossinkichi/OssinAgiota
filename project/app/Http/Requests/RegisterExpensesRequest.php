<?php

namespace App\Http\Requests;

use App\DTOs\RegisterExpensesDto;
use Illuminate\Foundation\Http\FormRequest;

class RegisterExpensesRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'description' => 'required|string|max:255',
            'observation' => 'nullable|string',
            'amount' => 'required|numeric|min:0.01',
            'expense_date' => 'required|date',
            'fixed' => 'nullable|boolean',
            'repeat' => 'nullable|integer|min:2',
            'tags' => 'nullable|array',
            'tags.*' => 'integer|exists:tags,id',
        ];
    }

    public function messages(): array
    {
        return [];
    }

    public function toDTO()
    {
        return new RegisterExpensesDto(
            user: $this->user()->id,
            description: $this->input('description'),
            observation: $this->input('observation'),
            amount: $this->input('amount'),
            expense_date: $this->input('expense_date'),
            fixed: $this->input('fixed', false),
            repeat: $this->input('repeat', 0),
            tags: $this->input('tags', []),
        );
    }
}
