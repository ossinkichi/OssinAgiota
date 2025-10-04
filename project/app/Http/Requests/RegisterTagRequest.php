<?php

namespace App\Http\Requests;

use App\DTOs\RegisterTagDto;
use Illuminate\Foundation\Http\FormRequest;

class RegisterTagRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|min:15',
            'text' => 'nullable|string|max:5000',
            'background' => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome da tag é obrigatório.',
            'name.string' => 'O nome da tag deve ser uma string.',
            'name.max' => 'O nome da tag não pode exceder 255 caracteres.',
            'name.unique' => 'Já existe uma tag com esse nome.',
            'description.string' => 'A descrição da tag deve ser uma string.',
            'description.max' => 'A descrição da tag não pode exceder 1000 caracteres.',
            'text.string' => 'A cor do texto deve ser uma string.',
            'text.max' => 'A cor do texto não pode exceder 5000 caracteres.',
            'background.string' => 'A cor de fundo deve ser uma string.',
            'background.max' => 'A cor de fundo não pode exceder 255 caracteres.',
        ];
    }

    public function toDTO()
    {
        return new RegisterTagDto(
            name: $this->input('name'),
            description: $this->input('description'),
            text: $this->input('text'),
            background: $this->input('background'),
        );
    }
}
