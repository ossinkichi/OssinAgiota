<?php

namespace App\Services;

use App\DTOs\LoginUserDto;
use App\Models\UserModel;
use App\DTOs\RegisterUserDto;
use App\DTOs\UpdateUserDto;
use Exception;

class UserService
{
    public function create(RegisterUserDto $userDto): UserModel
    {
        return UserModel::create(
            [
                'name' => $userDto->name,
                'email' => $userDto->email,
                'password' => $userDto->password,
            ]
        );
    }

    public function login(LoginUserDto $userDto): UserModel
    {
        $user = UserModel::where('email or name', $userDto->user)->first();

        if (!$user) {
            throw new \Exception('Senha ou usuário incorretos!');
        }

        if (!password_verify($userDto->password, $user->password)) {
            throw new Exception('Senha ou usuário incorretos!');
        }

        return $user;
    }

    public function update(UpdateUserDto $userDto): UserModel
    {
        return UserModel::where('id', $userDto->id)->update(
            [
                'name' => $userDto->name,
                'email' => $userDto->email,
            ]
        );
    }
}
