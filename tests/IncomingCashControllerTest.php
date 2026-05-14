<?php

use App\incoming_cash, App\bank, App\customer, App\po_customer, App\cashflow;

class IncomingCashControllerTest extends TestCase
{
    public function testIndexPageLoads()
    {
        $this->loginAs('admin');
        $this->visit('/incoming_cash')
             ->see('Incoming');
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
        customer::create([
            'kode_customer' => 'C001',
            'nama_customer' => 'Customer Test',
            'alamat_customer' => 'Jakarta',
        ]);
        $this->visit('/incoming_cash/create')
             ->see('Create');
    }

    public function testRequiresAuth()
    {
        $this->visit('/incoming_cash')
             ->seePageIs('/login');
    }
}
