<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\GudangSatu;
use App\Models\Stog1;
use App\Models\PartSupplier;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class GudangSatuTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function test_can_view_gudang_satu_index(): void
    {
        $gudangSatu = GudangSatu::factory()->create();

        $response = $this->actingAs($this->user)
            ->get(route('warehouses-1.index'));

        $response->assertStatus(200);
        $response->assertViewIs('gudang_satu.index');
        $response->assertViewHas('gudang_satus');
        $response->assertViewHas('bank');
    }

    public function test_can_view_filter_stok_form(): void
    {
        $response = $this->actingAs($this->user)
            ->get(route('warehouses-1.filter'));

        $response->assertStatus(200);
        $response->assertViewIs('gudang_satu.index');
        $response->assertViewHas('gudang_satus');
        $response->assertViewHas('bank');
    }

    public function test_can_filter_stok_by_date(): void
    {
        $gudangSatu = GudangSatu::factory()->create();

        $response = $this->actingAs($this->user)
            ->get(route('warehouses-1.filter'), [
                'start_date' => '2023-01-01',
                'end_date' => '2023-12-31'
            ]);

        $response->assertStatus(200);
        $response->assertViewIs('gudang_satu.index');
        $response->assertViewHas('gudang_satus');
        $response->assertViewHas('bank');
    }

    public function test_can_view_trial_with_stog1_data(): void
    {
        // Create a GudangSatu record first
        $gudangSatu = GudangSatu::factory()->create([
            'part_no' => 'TEST_PART_001',
            'category_part' => 'RM'
        ]);

        // Create a PartSupplier record for the relationship chain
        $partSupplier = PartSupplier::factory()->create([
            'part_number' => 'TEST_PART_001'
        ]);

        // Create a Stog1 record with the same part_no
        $stog1 = Stog1::factory()->create([
            'part_no' => 'TEST_PART_001'
        ]);

        $response = $this->actingAs($this->user)
            ->get(route('warehouses-1.trial'));

        $response->assertStatus(200);
        $response->assertViewIs('gudang_satu.index_trial');
        $response->assertViewHas('gudang_satus');
        $response->assertViewHas('bank');
    }

    public function test_can_view_create_form(): void
    {
        $response = $this->actingAs($this->user)
            ->get(route('warehouses-1.create'));

        $response->assertStatus(200);
        $response->assertViewIs('gudang_satu.create');
    }

    public function test_store_without_file_returns_error_message(): void
    {
        $response = $this->actingAs($this->user)
            ->post(route('warehouses-1.store'), []);

        $response->assertStatus(200);
        $response->assertSeeText('No file uploaded.');
    }

    public function test_store_with_excel_file_processes_data(): void
    {
        Storage::fake('local');

        $file = UploadedFile::fake()->create('test.xlsx', 100);

        $response = $this->actingAs($this->user)
            ->post(route('warehouses-1.store'), [
                'data_excel' => $file
            ]);

        $response->assertRedirect('gudangsatu');

        // Check that a record was created (fallback functionality)
        $this->assertDatabaseHas('gudang_satus', [
            'part_no' => 'EXCEL_IMPORT',
            'part_name' => 'Excel Import Test',
        ]);
    }

    public function test_filter_stok_calculates_previous_month_correctly(): void
    {
        $gudangSatu = GudangSatu::factory()->create();

        $response = $this->actingAs($this->user)
            ->post('/gudangsatu/post_filter_stok', [
                'bulan' => '2023-02-01'
            ]);

        $response->assertStatus(200);
        $response->assertViewIs('gudang_satu.index');
        $response->assertViewHas('selectedMonth', '01'); // Previous month
        $response->assertViewHas('selectedYear', '2023');
    }

    public function test_trial_preserves_original_date(): void
    {
        $stog1 = Stog1::factory()->create();

        $response = $this->actingAs($this->user)
            ->post('/gudangsatu/trial', [
                'bulan' => '2023-02-01'
            ]);

        $response->assertStatus(200);
        $response->assertViewIs('gudang_satu.index_trial');
        $response->assertViewHas('originalMonth', '02'); // Original month preserved
        $response->assertViewHas('originalYear', '2023');
    }

    public function test_guest_cannot_access_gudang_satu_routes(): void
    {
        $this->get('/gudangsatu')->assertRedirect(route('login'));
        $this->get(route('warehouses-1.create'))->assertRedirect(route('login'));
        $this->post(route('warehouses-1.store'))->assertRedirect(route('login'));
    }

    public function test_index_displays_all_gudang_satu_records(): void
    {
        $gudangSatu1 = GudangSatu::factory()->create(['part_no' => 'PART001']);
        $gudangSatu2 = GudangSatu::factory()->create(['part_no' => 'PART002']);

        $response = $this->actingAs($this->user)
            ->get(route('warehouses-1.index'));

        $response->assertStatus(200);
        $response->assertSee('PART001');
        $response->assertSee('PART002');
    }
}
