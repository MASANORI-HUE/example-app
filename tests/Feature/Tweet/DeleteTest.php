<?php

namespace Tests\Feature\Tweet;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_delete_succeeds(): void
    {
        $user = User::factory()->create();

        $tweet = Tweet::factory()->create(['user_id' => $user->id]);

        $this->actingAs($user);

        $response = $this->delete('/tweet/'.$tweet->id);

        $response->assertRedirect('/tweet');
    }
}
