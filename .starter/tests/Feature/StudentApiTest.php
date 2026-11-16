<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudentApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_health_check_returns_json(): void
    {
        $this->getJson('/api/health')
            ->assertOk()
            ->assertJsonPath('status', 'ok');
    }

    public function test_crud_endpoints_work(): void
    {
        // Create a record and confirm HTTP 201 (Created).
        $response = $this->postJson('/api/students', [
            'name' => 'Pedro Reyes',
            'course' => 'BSIT',
            'year_level' => 2,
        ])->assertCreated()->assertJsonPath('name', 'Pedro Reyes');

        $id = $response->json('id');

        // Read collection and a single record.
        $this->getJson('/api/students')->assertOk()->assertJsonCount(1);
        $this->getJson("/api/students/{$id}")
            ->assertOk()->assertJsonPath('course', 'BSIT');

        // Update one field, then delete the record.
        $this->patchJson("/api/students/{$id}", ['course' => 'BSCS'])
            ->assertOk()->assertJsonPath('course', 'BSCS');
        $this->deleteJson("/api/students/{$id}")->assertNoContent();
        $this->getJson("/api/students/{$id}")->assertNotFound();
    }

    public function test_validation_returns_422_json(): void
    {
        $this->postJson('/api/students', [
            'name' => '',
            'course' => '',
        ])->assertUnprocessable()->assertJsonValidationErrors(['name', 'course']);
    }
}
