<?php

use App\out_cash, App\bank, App\vendor, App\po_supplier;

class OutCashControllerTest extends TestCase
{
    public function testIndexPageLoads()
    {
        $this->loginAs('admin');
        $this->visit('/out_cash')
             ->see('Payment');
    }

    public function testCreatePageLoads()
    {
        $this->loginAs('admin');
        bank::create([
            'kode_bank' => 'BCA001',
            'nama_bank' => 'Bank BCA',
            'no_rek_bank' => '1234567890',
            'currency_bank' => 'IDR',
        ]);
        vendor::create([
            'kode_vendor' => 'V001',
            'nama_vendor' => 'Vendor Test',
            'alamat_vendor' => 'Jakarta',
        ]);
        $this->visit('/out_cash/create')
             ->see('Create');
    }

    public function testRequiresAuth()
    {
        $this->visit('/out_cash')
             ->seePageIs('/login');
    }
}
