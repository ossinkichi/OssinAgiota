<?php

namespace App\Http\Requests;

use App\DTOs\LoginUserDto;
use Illuminate\Foundation\Http\FormRequest;

class LoginUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user' => 'required|string|min:3',
            'password' => 'required|string|min:6'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O campo usuário é obrigatório.',
            'name.string' => 'O campo usuário deve ser uma string.',
            'name.min' => 'O campo de usuário deve ter pelo menos 3 caracteres',
            'password.required' => 'O campo senha é obrigatório.',
            'password.string' => 'O campo senha deve ser uma string.',
            'password.min' => 'A senha deve ter pelo menos 6 caracteres.'
        ];
    }

    public function toDTO()
    {
        return new LoginUserDto(
            $this->input('user'),
            $this->input('password')
        );
    }
}
