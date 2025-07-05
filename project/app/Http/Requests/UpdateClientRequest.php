<?php

namespace App\Http\Requests;

use App\DTOs\UpdateClientDto;
use Illuminate\Foundation\Http\FormRequest;

use function PHPSTORM_META\map;

class UpdateClientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => 'required/integer/exists:clients,id',
            'name' => 'required/string',
            'email' => 'nullable/email',
            'phone_1' => 'nullable/string',
            'phone_2' => 'nullable/string',
            'observation' => 'nullable/string',
            'tags' => 'nullable/array',
            'tags.*' => 'integer',
        ];
    }

    public function messages(): array
    {
        return [
            'id.required' => 'O ID do cliente é obrigatório.',
            'id.integer' => 'O ID do cliente deve ser um número inteiro.',
            'id.exists' => 'O cliente com o ID fornecido não existe.',
            'name.required' => 'O nome é obrigatório.',
            'email.email' => 'O email deve ser um endereço de email válido.',
            'phone_1.string' => 'O telefone 1 deve ser uma string.',
            'phone_2.string' => 'O telefone 2 deve ser uma string.',
            'observation.string' => 'A observação deve ser uma string.',
            'tags.array' => 'As tags devem ser um array.',
        ];
    }

    public function toDTO()
    {
        return new UpdateClientDto(
            id: $this->input('id'),
            name: $this->input('name'),
            email: $this->input('email'),
            address: $this->input('address'),
            phone_1: $this->input('phone_1'),
            phone_2: $this->input('phone_2'),
            observation: $this->input('observation'),
            tags: $this->input('tags'),
        );
    }
}
