<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function test_can_view_customer_index(): void
    {
        Customer::factory()->count(3)->create();

        $response = $this->actingAs($this->user)
            ->get(route('customers.index'));

        $response->assertStatus(200);
        $response->assertViewIs('customer.index');
    }

    public function test_can_view_customer_create_form(): void
    {
        $response = $this->actingAs($this->user)
            ->get(route('customers.create'));

        $response->assertStatus(200);
        $response->assertViewIs('customer.create');
    }

    public function test_can_create_customer(): void
    {
        $customerData = [
            'kode_customer' => 'CUST001',
            'nama_customer' => 'Test Customer',
            'alamat_customer' => 'Test Address',
        ];

        $response = $this->actingAs($this->user)
            ->post(route('customers.store'), $customerData);

        $response->assertRedirect(route('customers.index'));
        $this->assertDatabaseHas('customers', $customerData);
    }

    public function test_can_view_customer_edit_form(): void
    {
        $customer = Customer::factory()->create();

        $response = $this->actingAs($this->user)
            ->get(route('customers.edit', $customer));

        $response->assertStatus(200);
        $response->assertViewIs('customer.edit');
    }

    public function test_can_update_customer(): void
    {
        $customer = Customer::factory()->create();

        $updateData = [
            'kode_customer' => 'UPDATED001',
            'nama_customer' => 'Updated Customer',
            'alamat_customer' => 'Updated Address',
        ];

        $response = $this->actingAs($this->user)
            ->put(route('customers.update', $customer), $updateData);

        $response->assertRedirect(route('customers.index'));
        $this->assertDatabaseHas('customers', $updateData);
    }

    public function test_can_delete_customer(): void
    {
        $customer = Customer::factory()->create();

        $response = $this->actingAs($this->user)
            ->delete(route('customers.destroy', $customer));

        $response->assertRedirect(route('customers.index'));
        $this->assertDatabaseMissing('customers', ['id_customer' => $customer->id_customer]);
    }

    public function test_customer_validation_rules(): void
    {
        $response = $this->actingAs($this->user)
            ->post(route('customers.store'), []);

        $response->assertSessionHasErrors(['kode_customer', 'nama_customer']);
    }

    public function test_customer_unique_validation(): void
    {
        $customer = Customer::factory()->create();

        $response = $this->actingAs($this->user)
            ->post(route('customers.store'), [
                'kode_customer' => $customer->kode_customer,
                'nama_customer' => 'Another Customer',
                'alamat_customer' => 'Another Address',
            ]);

        $response->assertSessionHasErrors(['kode_customer']);
    }

    public function test_guest_cannot_access_customer_routes(): void
    {
        $customer = Customer::factory()->create();

        $this->get(route('customers.index'))->assertRedirect(route('login'));
        $this->get(route('customers.create'))->assertRedirect(route('login'));
        $this->post(route('customers.store'))->assertRedirect(route('login'));
        $this->get(route('customers.edit', $customer))->assertRedirect(route('login'));
        $this->put(route('customers.update', $customer))->assertRedirect(route('login'));
        $this->delete(route('customers.destroy', $customer))->assertRedirect(route('login'));
    }
}
