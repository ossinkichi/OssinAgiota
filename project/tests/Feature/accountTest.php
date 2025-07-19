<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class accountTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testClientRegister(): void
    {
        $response = $this->postJson(uri: '/api/client/register', data: [
            'name' => 'Test Client',
            'email' => '',
            'phone_1' => '123456789',
            'phone_2' => '',
            'address' => '123 Test St',
            'observation' => '',
            'tags' => [1, 2]
        ]);

        $response->assertStatus(201)->assertJson(
            value: []
        );
    }

    public function testCreateAccount(): void
    {
        $this->testClientRegister();

        $response = $this->postJson(uri: '/api/accounts/create', data: [
            'client' => 1,
            'description' => 'Test Account',
            'value' => 100.00,
            'installments' => 1,
            'date_of_paid' => '01',
            'status' => 'pendente',
            'tags' => [1, 2]
        ]);

        $response->assertStatus(201)->assertJson(
            value: []
        );
    }

    public function testGetAllAccountOfClients(): void
    {
        $this->testCreateAccount();

        $response = $this->get('/api/accounts/1');

        $response->assertStatus(200)->assertJson(
            value: [
                'data' => [
                    '0' => [
                        'id' => 1,
                        'description' => 'Test Account',
                        'value' => 100.00,
                        'installments' => 1,
                        'date_of_paid' => '01',
                        'paid_value' => 0.00,
                        'installemnts_paid' => 0,
                        'status' => 'pending',
                        'tags' => [1, 2],
                        'created_at' => $this->anything(),
                        'updated_at' => $this->anything(),
                    ]
                ]
            ]
        );
    }

    public function testUpdateAccount(): void
    {
        $this->testCreateAccount();

        $response = $this->put(uri: '/api/accounts/update', data: [
            'account' => 1,
            'client' => 1,
            'description' => 'Updated Account',
            'value' => 150.00,
            'installments' => 2,
            'date_of_paid' => '07',
            'tags' => [1, 3]
        ]);

        $response->assertStatus(201)->assertJson(
            value: []
        );
    }

    public function testPaidAccount(): void
    {
        $this->testCreateAccount();

        $response = $this->put(uri: '/api/accounts/paid', data: [
            'id' => 1,
            'client_id' => 1,
            'paid_value' => 100.00,
            'installemnts_paid' => 1,
            'status' => 'pendente'
        ]);

        $response->assertStatus(201)->assertJson(
            value: []
        );
    }
}
