<?php

namespace App\Services;

use App\DTOs\LoginUserDto;
use App\Models\Users;
use App\DTOs\RegisterUserDto;
use App\DTOs\ShowUserDto;
use App\DTOs\UpdateUserDto;
use Exception;
use Illuminate\Support\Facades\Hash;

class UserService
{

    public function show(int $id)
    {
        return Users::findOrFail($id);
    }

    public function create(RegisterUserDto $userDto): Users
    {
        return Users::create(
            [
                'name' => $userDto->name,
                'email' => $userDto->email,
                'password' => $userDto->password,
            ]
        );
    }

    public function login(LoginUserDto $userDto): Users
    {
        $user = Users::where('email', $userDto->user)->orWhere('name', $userDto->user)->first();

        if (!$user) {
            throw new \Exception('Senha ou usuário incorretos!');
        }

        if (!Hash::check($userDto->password, $user->password)) {
            throw new Exception('Senha ou usuário incorretos!');
        }

        return $user;
    }

    public function update(UpdateUserDto $userDto): Users
    {
        Users::where('id', $userDto->id)->update(
            [
                'name' => $userDto->name,
                'email' => $userDto->email,
            ]
        );

        return Users::findOrFail($userDto->id);
    }
}
