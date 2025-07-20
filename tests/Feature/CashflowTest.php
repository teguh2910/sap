<?php

namespace Tests\Feature;

use App\Models\Cashflow;
use App\Models\User;
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
        Cashflow::factory()->count(3)->create();

        $response = $this->actingAs($this->user)
            ->get(route('cashflows.index'));

        $response->assertStatus(200);
        $response->assertViewIs('cashflow.index');
    }

    public function test_can_view_cashflow_create_form(): void
    {
        $response = $this->actingAs($this->user)
            ->get(route('cashflows.create'));

        $response->assertStatus(200);
        $response->assertViewIs('cashflow.create');
    }

    public function test_can_create_cashflow(): void
    {
        $cashflowData = [
            'bank' => 'Test Bank',
            'beginning_balance' => 5000000,
            'incoming' => 1000000,
            'outgoing' => 500000,
            'ending_balance' => 5500000,
            'tgl_cashflow' => '2025-01-15',
        ];

        $response = $this->actingAs($this->user)
            ->post(route('cashflows.store'), $cashflowData);

        $response->assertRedirect(route('cashflows.index'));
        $this->assertDatabaseHas('cashflows', $cashflowData);
    }

    public function test_can_view_cashflow_edit_form(): void
    {
        $cashflow = Cashflow::factory()->create();

        $response = $this->actingAs($this->user)
            ->get(route('cashflows.edit', $cashflow));

        $response->assertStatus(200);
        $response->assertViewIs('cashflow.edit');
    }

    public function test_can_update_cashflow(): void
    {
        $cashflow = Cashflow::factory()->create();

        $updateData = [
            'bank' => 'Updated Bank',
            'beginning_balance' => 6000000,
            'incoming' => 1500000,
            'outgoing' => 800000,
            'ending_balance' => 6700000,
            'tgl_cashflow' => '2025-02-15',
        ];

        $response = $this->actingAs($this->user)
            ->put(route('cashflows.update', $cashflow), $updateData);

        $response->assertRedirect(route('cashflows.index'));
        $this->assertDatabaseHas('cashflows', $updateData);
    }

    public function test_can_delete_cashflow(): void
    {
        $cashflow = Cashflow::factory()->create();

        $response = $this->actingAs($this->user)
            ->delete(route('cashflows.destroy', $cashflow));

        $response->assertRedirect(route('cashflows.index'));
        $this->assertDatabaseMissing('cashflows', ['id_cashflow' => $cashflow->id_cashflow]);
    }

    public function test_cashflow_validation_rules(): void
    {
        $response = $this->actingAs($this->user)
            ->post(route('cashflows.store'), []);

        $response->assertSessionHasErrors(['bank', 'beginning_balance', 'tgl_cashflow']);
    }

    public function test_cashflow_numeric_validation(): void
    {
        $response = $this->actingAs($this->user)
            ->post(route('cashflows.store'), [
                'bank' => 'Test Bank',
                'beginning_balance' => 'not_a_number',
                'incoming' => 'invalid',
                'outgoing' => 'invalid',
                'ending_balance' => 'invalid',
                'tgl_cashflow' => '2025-01-15',
            ]);

        $response->assertSessionHasErrors(['beginning_balance', 'incoming', 'outgoing', 'ending_balance']);
    }

    public function test_guest_cannot_access_cashflow_routes(): void
    {
        $cashflow = Cashflow::factory()->create();

        $this->get(route('cashflows.index'))->assertRedirect(route('login'));
        $this->get(route('cashflows.create'))->assertRedirect(route('login'));
        $this->post(route('cashflows.store'))->assertRedirect(route('login'));
        $this->get(route('cashflows.edit', $cashflow))->assertRedirect(route('login'));
        $this->put(route('cashflows.update', $cashflow))->assertRedirect(route('login'));
        $this->delete(route('cashflows.destroy', $cashflow))->assertRedirect(route('login'));
    }
}
