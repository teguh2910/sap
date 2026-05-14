<?php

use App\gudang_satu, App\gudang_dua, App\detail_po_supplier, App\detail_po_customer, App\po_supplier, App\po_customer, App\vendor, App\customer, App\part_supplier, App\part_customer;

class DashboardControllerTest extends TestCase
{
    public function testStokPageLoads()
    {
        $this->loginAs('admin');
        $this->visit('/stok_all')
             ->see('Stok');
    }

    public function testPoPageLoads()
    {
        $this->loginAs('admin');
        $this->visit('/po_all')
             ->see('PO');
    }

    public function testPoCustomerPageLoads()
    {
        $this->loginAs('admin');
        $this->visit('/po_customer_all')
             ->assertResponseOk();
    }

    public function testHutangPageLoads()
    {
        $this->loginAs('admin');
        $this->visit('/hutang')
             ->assertResponseOk();
    }

    public function testPiutangPageLoads()
    {
        $this->loginAs('admin');
        $this->visit('/piutang')
             ->assertResponseOk();
    }

    public function testPnlPageLoads()
    {
        $this->loginAs('admin');
        $this->visit('/pnl')
             ->assertResponseOk();
    }

    public function testFilterStokPageLoads()
    {
        $this->loginAs('admin');
        $this->visit('/filter_stok_all')
             ->see('Filter');
    }

    public function testShowFilterStokReturnsData()
    {
        $this->loginAs('admin');

        gudang_satu::create([
            'part_no' => 'GS001',
            'part_name' => 'Part GS',
            'category_part' => 'RM',
            'beginning_balance' => 100,
        ]);

        gudang_dua::create([
            'part_no' => 'GD001',
            'part_name' => 'Part GD',
            'category_part' => 'RM',
            'beginning_balance' => 50,
        ]);

        $this->post('/filter_stok_all', [
            '_token' => csrf_token(),
            'bulan' => '07',
            'tahun' => '2023',
        ]);

        $this->assertResponseOk();
    }

    public function testStockCustomerPageLoads()
    {
        $this->loginAs('admin');
        $this->visit('/stock_customer')
             ->assertResponseOk();
    }

    public function testQtyProdCustomerPageLoads()
    {
        $this->loginAs('admin');
        $this->visit('/qty_prod_customer')
             ->assertResponseOk();
    }

    public function testRequiresAuth()
    {
        $this->visit('/stok_all')
             ->seePageIs('/login');
    }
}
