<?php

use App\sj_g1, App\truk, App\gudang_satu, App\po_customer, App\customer;

class SjG1ControllerTest extends TestCase
{
    public function testCreatePageLoads()
    {
        $this->loginAs('admin');

        gudang_satu::create([
            'part_no' => 'GS001',
            'part_name' => 'Part FG',
            'category_part' => 'fg',
            'beginning_balance' => 50,
        ]);

        truk::create([
            'kode_truk' => 'TRK001',
            'plat_no' => 'B1234CD',
            'driver' => 'Truk Driver',
        ]);

        $customer = customer::create([
            'kode_customer' => 'C001',
            'nama_customer' => 'Customer Test',
            'alamat_customer' => 'Jakarta',
        ]);

        po_customer::create([
            'no_po_customer' => 'POC001',
            'tgl_po_customer' => '2023-07-15',
            'id_customer' => $customer->id_customer,
        ]);

        $this->visit('/sjg1/create')
             ->see('Create');
    }

    public function testRequiresAuth()
    {
        $this->visit('/sjg1/create')
             ->seePageIs('/login');
    }
}
