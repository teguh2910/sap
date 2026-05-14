<?php

use App\usage_g1, App\gudang_satu, App\basemetal;

class UsageG1ControllerTest extends TestCase
{
    public function testCreatePageLoads()
    {
        $this->loginAs('admin');

        // Create basemetal data for the view
        basemetal::create([
            'kode_base_metal' => 'BM001',
            'nama_base_metal' => 'Base Metal Test',
            'price_base_metal' => 10000,
        ]);

        $this->visit('/usageg1/create')
             ->see('Create');
    }

    public function testStoreCreatesUsageG1()
    {
        $this->loginAs('admin');

        $basemetal = basemetal::create([
            'kode_base_metal' => 'BM001',
            'nama_base_metal' => 'Base Metal Test',
            'price_base_metal' => 10000,
        ]);

        gudang_satu::create([
            'part_no' => 'BM001',
            'part_name' => 'Base Metal Test',
            'category_part' => 'RM',
            'beginning_balance' => 100,
        ]);

        $this->post('/usageg1/create', [
            '_token' => csrf_token(),
            'id_base_metal' => $basemetal->id_base_metal,
            'qty_usage_g1' => 20,
            'tgl_usage_g1' => '2023-07-20',
            'lot_usage_g1' => 'LOTUG1001',
        ]);

        $this->assertRedirectedTo('/gudangsatu');
        $this->seeInDatabase('usage_g1s', [
            'id_base_metal' => $basemetal->id_base_metal,
            'qty_usage_g1' => 20,
            'lot_usage_g1' => 'LOTUG1001',
        ]);
    }

    public function testRequiresAuth()
    {
        $this->visit('/usageg1/create')
             ->seePageIs('/login');
    }
}
