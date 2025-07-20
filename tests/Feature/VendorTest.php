<?php

namespace Tests\Feature;

use App\Models\Vendor;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VendorTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function test_can_view_vendor_index(): void
    {
        Vendor::factory()->count(3)->create();

        $response = $this->actingAs($this->user)
            ->get(route('vendors.index'));

        $response->assertStatus(200);
        $response->assertViewIs('vendor.index');
    }

    public function test_can_view_vendor_create_form(): void
    {
        $response = $this->actingAs($this->user)
            ->get(route('vendors.create'));

        $response->assertStatus(200);
        $response->assertViewIs('vendor.create');
    }

    public function test_can_create_vendor(): void
    {
        $vendorData = [
            'kode_vendor' => 'VEND001',
            'nama_vendor' => 'Test Vendor',
            'alamat_vendor' => 'Test Address',
            'telp_vendor' => '081234567890',
            'email_vendor' => 'test@vendor.com',
            'pic_vendor' => 'John Doe',
        ];

        $response = $this->actingAs($this->user)
            ->post(route('vendors.store'), $vendorData);

        $response->assertRedirect(route('vendors.index'));
        $this->assertDatabaseHas('vendors', $vendorData);
    }

    public function test_can_update_vendor(): void
    {
        $vendor = Vendor::factory()->create();

        $updateData = [
            'kode_vendor' => 'UPDATED001',
            'nama_vendor' => 'Updated Vendor',
            'alamat_vendor' => 'Updated Address',
            'telp_vendor' => '089876543210',
            'email_vendor' => 'updated@vendor.com',
            'pic_vendor' => 'Jane Doe',
        ];

        $response = $this->actingAs($this->user)
            ->put(route('vendors.update', $vendor), $updateData);

        $response->assertRedirect(route('vendors.index'));
        $this->assertDatabaseHas('vendors', $updateData);
    }

    public function test_can_delete_vendor(): void
    {
        $vendor = Vendor::factory()->create();

        $response = $this->actingAs($this->user)
            ->delete(route('vendors.destroy', $vendor));

        $response->assertRedirect(route('vendors.index'));
        $this->assertDatabaseMissing('vendors', ['id_vendor' => $vendor->id_vendor]);
    }

    public function test_vendor_validation_rules(): void
    {
        $response = $this->actingAs($this->user)
            ->post(route('vendors.store'), []);

        $response->assertSessionHasErrors(['kode_vendor', 'nama_vendor']);
    }

    public function test_guest_cannot_access_vendor_routes(): void
    {
        $vendor = Vendor::factory()->create();

        $this->get(route('vendors.index'))->assertRedirect(route('login'));
        $this->get(route('vendors.create'))->assertRedirect(route('login'));
        $this->post(route('vendors.store'))->assertRedirect(route('login'));
        $this->get(route('vendors.edit', $vendor))->assertRedirect(route('login'));
        $this->put(route('vendors.update', $vendor))->assertRedirect(route('login'));
        $this->delete(route('vendors.destroy', $vendor))->assertRedirect(route('login'));
    }
}
