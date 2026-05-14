<?php

use App\usage_g2, App\gudang_dua, App\material;

class UsageG2ControllerTest extends TestCase
{
    public function testCreatePageLoads()
    {
        $this->loginAs('admin');

        // Create material data for the view
        material::create([
            'kode_material' => 'MAT001',
            'nama_material' => 'Material Test',
            'price_material' => '10000',
        ]);

        $this->visit('/usageg2/create')
             ->see('Create');
    }

    public function testStoreCreatesUsageG2()
    {
        $this->loginAs('admin');

        $material = material::create([
            'kode_material' => 'MAT001',
            'nama_material' => 'Material Test',
            'price_material' => '10000',
        ]);

        gudang_dua::create([
            'part_no' => 'MAT001',
            'part_name' => 'Material Test',
            'category_part' => 'RM',
            'beginning_balance' => 100,
        ]);

        $this->post('/usageg2/create', [
            '_token' => csrf_token(),
            'id_material' => $material->id_material,
            'qty_usage_g2' => 30,
            'tgl_usage_g2' => '2023-07-20',
            'lot_usage_g2' => 'LOTUG2001',
        ]);

        $this->assertRedirectedTo('/gudangdua');
        $this->seeInDatabase('usage_g2s', [
            'id_material' => $material->id_material,
            'qty_usage_g2' => 30,
            'lot_usage_g2' => 'LOTUG2001',
        ]);
    }

    public function testRequiresAuth()
    {
        $this->visit('/usageg2/create')
             ->seePageIs('/login');
    }
}
