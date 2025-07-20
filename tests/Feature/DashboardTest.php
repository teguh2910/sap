<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\GudangSatu;
use App\Models\GudangDua;
use App\Models\DetailPoSupplier;
use App\Models\DetailPoCustomer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function test_can_view_dashboard_index(): void
    {
        $response = $this->actingAs($this->user)
            ->get(route('dashboard'));

        $response->assertStatus(200);
        $response->assertViewIs('dashboard');
    }

    public function test_dashboard_filter_stok_all(): void
    {
        $response = $this->actingAs($this->user)
            ->post(route('dashboard'), [
                'bulan' => '01',
                'tahun' => '2025'
            ]);

        $response->assertStatus(200);
        $response->assertViewIs('dashboard');
    }

    public function test_can_view_po_dashboard(): void
    {
        $response = $this->actingAs($this->user)
            ->get(route('dashboard.po'));

        $response->assertStatus(200);
        $response->assertViewIs('dashboard.po');
    }

    public function test_can_view_po_customer_dashboard(): void
    {
        $response = $this->actingAs($this->user)
            ->get(route('dashboard.po-customer'));

        $response->assertStatus(200);
        $response->assertViewIs('dashboard.po_customer');
    }

    public function test_can_view_hutang_dashboard(): void
    {
        $response = $this->actingAs($this->user)
            ->get(route('dashboard.hutang'));

        $response->assertStatus(200);
        $response->assertViewIs('dashboard.hutang');
    }

    public function test_can_view_stock_customer_dashboard(): void
    {
        $response = $this->actingAs($this->user)
            ->get(route('dashboard.stock-customer'));

        $response->assertStatus(200);
        $response->assertViewIs('dashboard.stock_customer');
    }

    public function test_can_view_qty_prod_customer_dashboard(): void
    {
        $response = $this->actingAs($this->user)
            ->get(route('dashboard.qty-prod-customer'));

        $response->assertStatus(200);
        $response->assertViewIs('dashboard.qty_prod_customer');
    }

    public function test_dashboard_with_data(): void
    {
        // Create some test data
        GudangSatu::factory()->count(5)->create();
        GudangDua::factory()->count(5)->create();

        $response = $this->actingAs($this->user)
            ->get(route('dashboard'));

        $response->assertStatus(200);
        $response->assertViewHas(['gudang_satu_count', 'gudang_dua_count', 'po_customer_count']);
    }

    public function test_guest_cannot_access_dashboard(): void
    {
        $this->get(route('dashboard'))->assertRedirect(route('login'));
        $this->get(route('dashboard.po'))->assertRedirect(route('login'));
        $this->get(route('dashboard.po-customer'))->assertRedirect(route('login'));
        $this->get(route('dashboard.hutang'))->assertRedirect(route('login'));
    }

    public function test_dashboard_handles_empty_data(): void
    {
        $response = $this->actingAs($this->user)
            ->get(route('dashboard'));

        $response->assertStatus(200);
        $response->assertViewIs('dashboard');
    }

    public function test_dashboard_filter_with_invalid_date(): void
    {
        $response = $this->actingAs($this->user)
            ->post(route('dashboard'), [
                'bulan' => '13', // Invalid month
                'tahun' => '2025'
            ]);

        $response->assertStatus(200);
        $response->assertViewIs('dashboard');
    }
}
