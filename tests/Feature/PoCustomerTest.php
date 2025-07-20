<?php

namespace Tests\Feature;

use App\Models\PoCustomer;
use App\Models\Customer;
use App\Models\PartCustomer;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PoCustomerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function test_can_view_po_customer_index(): void
    {
        PoCustomer::factory()->count(3)->create();

        $response = $this->actingAs($this->user)
            ->get(route('po-customers.index'));

        $response->assertStatus(200);
        $response->assertViewIs('po_customer.index');
    }

    public function test_can_view_po_customer_create_form(): void
    {
        Customer::factory()->count(2)->create();
        PartCustomer::factory()->count(3)->create();

        $response = $this->actingAs($this->user)
            ->get(route('po-customers.create'));

        $response->assertStatus(200);
        $response->assertViewIs('po_customer.create');
    }

    public function test_can_create_po_customer(): void
    {
        $customer = Customer::factory()->create();

        $poData = [
            'no_po_customer' => 'PO-CUST-001',
            'id_customer' => $customer->id_customer,
            'id_produk' => '1',
            'qty_po_customer' => '10',
            'harga_po_customer' => '50000',
        ];

        $response = $this->actingAs($this->user)
            ->post(route('po-customers.store'), $poData);

        $response->assertRedirect(route('po-customers.index'));
        $this->assertDatabaseHas('po_customers', $poData);
    }

    public function test_can_view_po_customer_edit_form(): void
    {
        $poCustomer = PoCustomer::factory()->create();
        Customer::factory()->count(2)->create();
        PartCustomer::factory()->count(3)->create();

        $response = $this->actingAs($this->user)
            ->get(route('po-customers.edit', $poCustomer));

        $response->assertStatus(200);
        $response->assertViewIs('po_customer.edit');
    }

    public function test_can_update_po_customer(): void
    {
        $poCustomer = PoCustomer::factory()->create();
        $newCustomer = Customer::factory()->create();

        $updateData = [
            'no_po_customer' => 'PO-CUST-UPDATED',
            'id_customer' => $newCustomer->id_customer,
            'id_produk' => '2',
            'qty_po_customer' => '20',
            'harga_po_customer' => '75000',
        ];

        $response = $this->actingAs($this->user)
            ->put(route('po-customers.update', $poCustomer), $updateData);

        $response->assertRedirect(route('po-customers.index'));
        $this->assertDatabaseHas('po_customers', $updateData);
    }

    public function test_can_delete_po_customer(): void
    {
        $poCustomer = PoCustomer::factory()->create();

        $response = $this->actingAs($this->user)
            ->delete(route('po-customers.destroy', $poCustomer));

        $response->assertRedirect(route('po-customers.index'));
        $this->assertDatabaseMissing('po_customers', ['id_po_customer' => $poCustomer->id_po_customer]);
    }

    public function test_po_customer_validation_rules(): void
    {
        $response = $this->actingAs($this->user)
            ->post(route('po-customers.store'), []);

        $response->assertSessionHasErrors(['no_po_customer', 'id_customer']);
    }

    public function test_po_customer_unique_validation(): void
    {
        $poCustomer = PoCustomer::factory()->create();

        $response = $this->actingAs($this->user)
            ->post(route('po-customers.store'), [
                'no_po_customer' => $poCustomer->no_po_customer,
                'id_customer' => $poCustomer->id_customer,
                'id_produk' => '1',
            'qty_po_customer' => '5',
            'harga_po_customer' => '25000',
            ]);

        $response->assertSessionHasErrors(['no_po_customer']);
    }

    public function test_guest_cannot_access_po_customer_routes(): void
    {
        $poCustomer = PoCustomer::factory()->create();

        $this->get(route('po-customers.index'))->assertRedirect(route('login'));
        $this->get(route('po-customers.create'))->assertRedirect(route('login'));
        $this->post(route('po-customers.store'))->assertRedirect(route('login'));
        $this->get(route('po-customers.edit', $poCustomer))->assertRedirect(route('login'));
        $this->put(route('po-customers.update', $poCustomer))->assertRedirect(route('login'));
        $this->delete(route('po-customers.destroy', $poCustomer))->assertRedirect(route('login'));
    }
}
