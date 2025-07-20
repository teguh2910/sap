<?php

namespace Tests\Feature;

use App\Models\Cashflow;
use App\Models\User;
use App\Http\Controllers\CashflowController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CashflowTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function test_can_view_cashflow_index(): void
    {
        $response = $this->actingAs($this->user)
            ->get(route('cashflows.index'));

        $response->assertStatus(200);
        $response->assertViewIs('cash_flow.index');
    }

    public function test_can_view_cashflow_create_form(): void
    {
        $response = $this->actingAs($this->user)
            ->get(route('cashflows.create'));

        $response->assertStatus(200);
        $response->assertViewIs('cash_flow.create');
    }

    public function test_can_create_cashflow_without_file(): void
    {
        $response = $this->actingAs($this->user)
            ->post(route('cashflows.store'), []);

        $response->assertStatus(200);
        $response->assertSeeText('No file uploaded.');
    }

    public function test_cashflow_controller_only_has_basic_methods(): void
    {
        // Test that the controller only supports index, create, and store
        $this->assertTrue(method_exists(CashflowController::class, 'index'));
        $this->assertTrue(method_exists(CashflowController::class, 'create'));
        $this->assertTrue(method_exists(CashflowController::class, 'store'));

        // These methods should not exist
        $this->assertFalse(method_exists(CashflowController::class, 'edit'));
        $this->assertFalse(method_exists(CashflowController::class, 'update'));
        $this->assertFalse(method_exists(CashflowController::class, 'destroy'));
    }



    public function test_guest_cannot_access_cashflow_routes(): void
    {
        $this->get(route('cashflows.index'))->assertRedirect(route('login'));
        $this->get(route('cashflows.create'))->assertRedirect(route('login'));
        $this->post(route('cashflows.store'))->assertRedirect(route('login'));
    }
}
