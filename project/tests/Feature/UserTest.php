<?php

namespace Tests\Feature;

use DateTime;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{

    use RefreshDatabase;

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
        $this->testRegister();

        $this->post(
            'api/user/login',
            [
                'user' => 'Test User',
                'password' => 'password'
            ]
        )->assertJson([
            'message' => 'Usuário logado com sucesso!',
            'user' => [
                'id' => 1,
                'name' => 'Test User',
                'email' => null,
                'email_verified' => '0',
                'created_at' => '2025/07/01',
                'updated_at' => '2025/07/01'
            ]
        ])->assertStatus(200);
    }

    public function testUpdate(): void
    {
        $this->testRegister();

        $this->put(
            'api/user/update',
            [
                'id' => 1,
                'name' => 'Updated User',
                'email' => 'emailUpdated@gmail.com',
            ]
        )->assertJson([])->assertStatus(201);
    }

    public function testShow(): void
    {
        $this->testRegister();

        $this->get('api/user/show/1')->assertJson([
            'message' => 'Usuário encontrado com sucesso!',
            'user' => [
                'id' => 1,
                'name' => 'Test User',
                'email' => null,
                'email_verified' => 0,
                'created_at' => (new DateTime())->format('Y/m/d'),
                'updated_at' => (new DateTime())->format('Y/m/d')
            ]
        ])->assertStatus(200);
    }
}
