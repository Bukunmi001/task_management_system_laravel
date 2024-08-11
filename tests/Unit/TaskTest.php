<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that a task can be created.
     */
    public function test_a_task_can_be_created()
    {
        // Create a user for authentication
        $user = User::factory()->create();

        // Act as the created user
        $this->actingAs($user, 'sanctum');

        // Make a POST request to create a task
        $response = $this->postJson('/api/tasks', [
            'title' => 'Test Task',
            'description' => 'This is a test task',
            'status' => 'pending',
        ]);

        // Assert the response status is 201 (Created)
        $response->assertStatus(201)
                 ->assertJson([
                     'title' => 'Test Task',
                 ]);
    }
}
