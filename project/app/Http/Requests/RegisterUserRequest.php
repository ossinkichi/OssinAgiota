<?php

namespace App\Http\Requests;

use App\DTOs\RegisterUserDto;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class RegisterUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'email|nullable',
            'password' => 'required|string|min:6',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'name.string' => 'O campo nome deve ser uma string.',
            'name.max' => 'O campo nome não pode ter mais de 255 caracteres.',
            'email.email' => 'O campo email deve ser um endereço de e-mail válido.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.string' => 'O campo senha deve ser uma string.',
            'password.min' => 'A senha deve ter pelo menos 6 caracteres.',
        ];
    }

    public function toDTO()
    {
        return new RegisterUserDto(
            $this->input('name'),
            $this->input('email'),
            Hash::make($this->input('password')),
        );
    }
}
