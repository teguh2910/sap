<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function test_can_view_home_page(): void
    {
        $response = $this->actingAs($this->user)
            ->get(route('home'));

        $response->assertStatus(200);
        $response->assertViewIs('dashboard');
    }

    public function test_guest_cannot_access_home_page(): void
    {
        $response = $this->get(route('home'));

        $response->assertRedirect(route('login'));
    }

    public function test_home_route_redirects_to_dashboard_view(): void
    {
        $response = $this->actingAs($this->user)
            ->get('/');

        $response->assertStatus(200);
        $response->assertViewIs('dashboard');
    }
}
