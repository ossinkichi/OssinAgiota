<?php

namespace App\Http\Requests;

use App\DTOs\UpdateUserDto;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => 'required|integer|exists:users,id',
            'name' => 'required|string|min:3',
            'email' => 'nullable|email',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome é obrigatório.',
            'name.string' => 'O nome deve ser uma string.',
            'name.min' => 'O nome deve ter pelo menos 3 caracteres.',
            'email.email' => 'O email deve ser um endereço de email válido.',
        ];
    }

    public function toDTO()
    {
        return new UpdateUserDto(
            $this->input('id'),
            $this->input('name'),
            $this->input('email'),
        );
    }
}
