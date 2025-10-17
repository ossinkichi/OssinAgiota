<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TagsTest extends TestCase
{

    use RefreshDatabase;

    public function testCreate(): void
    {
        $this->postJson('api/tag/register', [
            'name' => 'Tag Teste',
        ])->assertJson([])->assertStatus(201);
    }


    public function testgetAll(): void
    {
        $this->testCreate();
        $this->get('api/tags')->assertJson(
            [
                'message' => 'Tags encontradas',
                'data' => [
                    [
                        'id' => 1,
                        'name' => 'Tag Teste',
                        'description' => null,
                        'color' => null,
                        'background' => null,
                    ]
                ]
            ]
        )->assertStatus(200);
    }
}
