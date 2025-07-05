<?php

namespace App\Http\Requests;

use App\DTOs\RegisterClientDto;
use Illuminate\Foundation\Http\FormRequest;

class RegisterClientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3',
            'email' => 'email|nullable',
            'phone_1' => 'string|nullable|min:9|max:20',
            'phone_2' => 'string|nullable|min:9|max:20',
            'address' => 'string|nullable',
            'observation' => 'string|nullable',
            'tags' => 'array|nullable',
            'tags.*' => 'integer|nullable', // Cada tag deve ser uma string
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'name.string' => 'O campo nome deve ser uma string.',
            'name.max' => 'O campo nome não pode ter mais de 255 caracteres.',
            'email.email' => 'O campo email deve ser um endereço de e-mail válido.',
            'phone_1.string' => 'O campo telefone 1 deve ser uma string.',
            'phone_1.max' => 'O campo telefone 1 não pode ter mais de 20 caracteres.',
            'phone_2.string' => 'O campo telefone 2 deve ser uma string.',
            'phone_2.max' => 'O campo telefone 2 não pode ter mais de 20 caracteres.',
            'address.string' => 'O campo endereço deve ser uma string.',
            'observation.string' => 'O campo observação deve ser uma string.',
            'tags.array' => 'O campo tags deve ser um array.',
            'tags.*.string' => 'Cada tag deve ser uma string.',
            'tags.*.max' => 'Cada tag não pode ter mais de 255 caracteres.',
        ];
    }

    public function toDTO()
    {
        return new RegisterClientDto(
            $this->input('name'),
            $this->input('email'),
            $this->input('phone_1'),
            $this->input('phone_2'),
            $this->input('address'),
            $this->input('observation'),
            $this->input('tags', []),
        );
    }
}
