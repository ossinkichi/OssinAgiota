<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TagsTest extends TestCase
{

    use RefreshDatabase;

    public function testCreate(): void
    {
        $this->post('api/tag/register', [
            'name' => 'Tag Teste',
        ])->assertJson([])->assertStatus(201);
    }


    public function testgetAll(): void
    {
        $this->testCreate();
        $this->get('api/tags')->assertStatus(200)->assertJson(
            [
                'message' => 'Tags encontradas',
                'data' => []
            ]
        );
    }
}
