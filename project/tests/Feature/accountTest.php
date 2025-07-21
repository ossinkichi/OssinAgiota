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
                'message' => 'Contas encontradas.',
                'data' => [
                    [
                        'id' => 1,
                        'description' => 'Test Account',
                        'value' => 100,
                        'installments' => 1,
                        'date_of_paid' => '01',
                        'paid_value' => null,
                        'installemnts_paid' => null,
                        'status' => 'pendente',
                        'tags' => [1, 2],
                        'created_at' => \date('Y/m/d'),
                        'updated_at' => \date('Y/m/d'),
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

        $response = $this->put(uri: '/api/accounts/pay', data: [
            'id' => 1,
            'client' => 1,
            'paidValue' => 100.00,
            'installemntsPaid' => 1,
            'status' => 'pago'
        ]);

        $response->assertStatus(201)->assertJson(
            value: []
        );
    }
}
