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
            'client_id' => 1,
            'description' => 'Test Account',
            'value' => 100.00,
            'installments' => 1,
            'date_of_paid' => '2023-10-01',
            'paid_value' => 0.00,
            'installemnts_paid' => 0,
            'status' => 'pending',
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

        $response->assertStatus(200);
    }

    public function testUpdateAccount(): void
    {
        $this->testCreateAccount();

        $response = $this->putJson(uri: '/api/accounts/update', data: [
            'id' => 1,
            'client_id' => 1,
            'description' => 'Updated Account',
            'value' => 150.00,
            'installments' => 2,
            'date_of_paid' => '2023-10-02',
            'status' => 'active',
            'tags' => [1, 3]
        ]);

        $response->assertStatus(201)->assertJson(
            value: []
        );
    }

    public function testPaidAccount(): void
    {
        $this->testCreateAccount();

        $response = $this->postJson(uri: '/api/accounts/paid', data: [
            'id' => 1,
            'client_id' => 1,
            'paid_value' => 100.00,
            'installemnts_paid' => 1,
            'status' => 'paid'
        ]);

        $response->assertStatus(201)->assertJson(
            value: []
        );
    }
}
