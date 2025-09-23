<?php

namespace App\Http\Requests;

use App\DTOs\UpdateExpenseDto;
use Illuminate\Foundation\Http\FormRequest;

class UpdateExpensesRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'amount' => 'required|numeric',
            'description' => 'required|string|max:255',
            'observation' => 'nullable|string|max:1000',
            'tags' => 'nullable|array',
            'tags.*' => 'string|max:50',
        ];
    }

    public function messages(): array
    {
        return [
            'amount.required' => 'The amount field is required.',
            'amount.numeric' => 'The amount must be a number.',
            'description.required' => 'The description field is required.',
            'description.string' => 'The description must be a string.',
            'description.max' => 'The description may not be greater than 255 characters.',
            'observation.string' => 'The observation must be a string.',
            'observation.max' => 'The observation may not be greater than 1000 characters.',
            'tags.array' => 'The tags must be an array.',
            'tags.*.string' => 'Each tag must be a string.',
            'tags.*.max' => 'Each tag may not be greater than 50 characters.',
        ];
    }

    public function toDTO()
    {
        return new UpdateExpenseDto(
            amount: $this->input('amount'),
            description: $this->input('description'),
            observation: $this->input('observation'),
            tags: $this->input('tags', []),
        );
    }
}
