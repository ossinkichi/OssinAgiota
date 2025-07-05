<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClientTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testClientRegister(): void
    {
        $response = $this->post(uri: '/api/client/register', data: [
            'name' => 'Test Client',
            'email' => '',
            'phone_1' => '123456789',
            'phone_2' => '',
            'address' => '123 Test St',
            'observation' => '',
            'tags' => json_encode([1, 2])
        ]);

        $response->assertStatus(201)->assertJson(
            value: []
        );
    }

    public function testClientsLister(): void
    {
        $this->testClientRegister();

        $response = $this->get(uri: '/api/clients');

        $response->assertStatus(200)->assertJson(
            [
                'message' => 'Clientes encontrados.',
                'data' => [
                    [
                        'name' => 'Test Client',
                        'email' => '',
                        'phone_1' => '123456789',
                        'phone_2' => '',
                        'address' => '123 Test St',
                        'observation' => '',
                        'tags' => [1, 2]
                    ]
                ]
            ]
        );
    }

    public function testClientUpdate(): void
    {
        $this->testClientRegister();

        $response = $this->put(uri: 'api/client/update', data: [
            'id' => 1,
            'name' => 'Updated Client',
            'email' => 'test@gmail.com',
            'phone_1' => '987654321',
            'phone_2' => '123412234',
            'address' => '456 Updated St',
            'observation' => 'isso é apensa um teste',
            'tags' => json_encode([3, 4])
        ]);

        $response->assertStatus(201);
    }
}
