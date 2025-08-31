<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExpenses extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [];
    }

    public function messages(): array
    {
        return [];
    }

    public function toDTO()
    {
        // Retornar DTO com dados validados (opcional)
    }
}
