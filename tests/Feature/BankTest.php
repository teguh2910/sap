<?php

namespace Tests\Feature;

use App\Models\Bank;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BankTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        // Create a user for authentication
        $this->user = User::factory()->create();
    }

    public function test_can_create_bank(): void
    {
        $bankData = [
            'kode_bank' => 'BCA001',
            'nama_bank' => 'Bank Central Asia',
            'alamat_bank' => 'Jakarta',
            'no_rek_bank' => '1234567890',
            'currency_bank' => 'IDR',
        ];

        $response = $this->actingAs($this->user)
            ->post(route('banks.store'), $bankData);

        $response->assertRedirect(route('banks.index'));
        $this->assertDatabaseHas('banks', $bankData);
    }

    public function test_can_view_bank_list(): void
    {
        Bank::factory()->count(3)->create();

        $response = $this->actingAs($this->user)
            ->get(route('banks.index'));

        $response->assertStatus(200);
        $response->assertViewIs('bank.index');
    }

    public function test_can_update_bank(): void
    {
        $bank = Bank::factory()->create();

        $updateData = [
            'kode_bank' => 'UPDATED001',
            'nama_bank' => 'Updated Bank Name',
            'alamat_bank' => 'Updated Address',
            'no_rek_bank' => '9876543210',
            'currency_bank' => 'USD',
        ];

        $response = $this->actingAs($this->user)
            ->put(route('banks.update', $bank), $updateData);

        $response->assertRedirect(route('banks.index'));
        $this->assertDatabaseHas('banks', $updateData);
    }

    public function test_can_delete_bank(): void
    {
        $bank = Bank::factory()->create();

        $response = $this->actingAs($this->user)
            ->delete(route('banks.destroy', $bank));

        $response->assertRedirect(route('banks.index'));
        $this->assertDatabaseMissing('banks', ['id_bank' => $bank->id_bank]);
    }

    public function test_bank_validation_rules(): void
    {
        $response = $this->actingAs($this->user)
            ->post(route('banks.store'), []);

        $response->assertSessionHasErrors(['kode_bank', 'nama_bank', 'no_rek_bank', 'currency_bank']);
    }
}
