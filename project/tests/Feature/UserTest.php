<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{

    public function testRegister(): void
    {
        $response = $this->post(
            'api/user/register',
            [
                'name' => 'Test User',
                'email' => '',
                'password' => 'password',
                'password_confirmation' => 'password'
            ]
        )->assertJson([])->assertStatus(201);
    }

    public function testLogin(): void
    {
        $this->testRegister();;

        $this->post(
            'api/user/login',
            [
                'user' => 'Test User',
                'password' => 'password'
            ]
        )->assertJson([
            'message' => 'Usuário logado com sucesso!',
            'user' > [
                'id' => 1,
                'name' => 'Test User',
                'email' => ''
            ]
        ])->assertStatus(200);
    }

    public function testUpdate(): void
    {
        $this->testRegister();

        $this->put(
            'api/user/update',
            [
                'name' => 'Updated User',
                'email' => 'emailUpdated@gmail.com',
            ]
        )->assertJson([
            'message' => 'Usuário atualizado com sucesso!',
            'user' => [
                'id' => 1,
                'name' => 'Updated User',
                'email' => 'emailUpdated@gmail.com'
            ]
        ])->assertStatus(200);
    }
}
