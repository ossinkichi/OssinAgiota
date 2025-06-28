<?php

namespace App\Http\Requests;

use App\DTOs\UserDto;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'password_confirmation' => 'required|string|min:6|same:password'
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
            'password_confirmation.required' => 'A confirmação da senha é obrigatória.',
            'password_confirmation.string' => 'A confirmação da senha deve ser uma string.',
            'password_confirmation.min' => 'A confirmação da senha deve ter pelo menos 6 caracteres.',
            'password_confirmation.same' => 'A confirmação da senha deve ser igual à senha.'
        ];
    }

    public function toDTO()
    {
        return new UserDto(
            $this->input('name'),
            $this->input('email'),
            \password_hash($this->input('password'), PASSWORD_DEFAULT),
        );
    }
}
