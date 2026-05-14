<?php

use App\detail_prod_g2, App\prod_g2, App\gudang_dua, App\po_customer, App\customer;

class DetailProdG2ControllerTest extends TestCase
{
    public function testIndexPageLoads()
    {
        $this->loginAs('admin');

        $customer = customer::create([
            'kode_customer' => 'C001',
            'nama_customer' => 'Customer Test',
            'alamat_customer' => 'Jakarta',
        ]);

        $po = po_customer::create([
            'no_po_customer' => 'POC001',
            'tgl_po_customer' => '2023-07-15',
            'id_customer' => $customer->id_customer,
        ]);

        $prod = prod_g2::create([
            'lot_prod_g2' => 'LOT001',
            'tgl_prod_g2' => '2023-07-20',
            'id_po_customer' => $po->id_po_customer,
        ]);

        $this->visit('/detailprodg2/' . $prod->id_prod_g2)
             ->see('Detail');
    }

    public function testStoreCreatesDetailProdG2()
    {
        $this->loginAs('admin');

        $customer = customer::create([
            'kode_customer' => 'C001',
            'nama_customer' => 'Customer Test',
            'alamat_customer' => 'Jakarta',
        ]);

        $po = po_customer::create([
            'no_po_customer' => 'POC001',
            'tgl_po_customer' => '2023-07-15',
            'id_customer' => $customer->id_customer,
        ]);

        $prod = prod_g2::create([
            'lot_prod_g2' => 'LOT001',
            'tgl_prod_g2' => '2023-07-20',
            'id_po_customer' => $po->id_po_customer,
        ]);

        $gudang = gudang_dua::create([
            'part_no' => 'GD001',
            'part_name' => 'Part GD',
            'category_part' => 'RM',
            'beginning_balance' => 100,
        ]);

        $this->post('/detailprodg2/create', [
            '_token' => csrf_token(),
            'id_prod_g2' => $prod->id_prod_g2,
            'id_gudang_dua_1' => $gudang->id_gudang_dua,
            'qty_prod_g2_1' => 10,
            'submit_fg' => 'submit_fg',
        ]);

        $this->assertRedirectedTo('/prodg2');
        $this->seeInDatabase('detail_prod_g2s', [
            'id_prod_g2' => $prod->id_prod_g2,
            'id_gudang_dua' => $gudang->id_gudang_dua,
            'qty_prod_g2' => 10,
        ]);
    }

    public function testUpdateDetailProdG2ViaAjax()
    {
        $this->loginAs('admin');

        $customer = customer::create([
            'kode_customer' => 'C001',
            'nama_customer' => 'Customer Test',
            'alamat_customer' => 'Jakarta',
        ]);

        $po = po_customer::create([
            'no_po_customer' => 'POC001',
            'tgl_po_customer' => '2023-07-15',
            'id_customer' => $customer->id_customer,
        ]);

        $prod = prod_g2::create([
            'lot_prod_g2' => 'LOT001',
            'tgl_prod_g2' => '2023-07-20',
            'id_po_customer' => $po->id_po_customer,
        ]);

        $gudang = gudang_dua::create([
            'part_no' => 'GD001',
            'part_name' => 'Part GD',
            'category_part' => 'RM',
            'beginning_balance' => 100,
        ]);

        $detail = detail_prod_g2::create([
            'id_prod_g2' => $prod->id_prod_g2,
            'id_gudang_dua' => $gudang->id_gudang_dua,
            'qty_prod_g2' => 10,
        ]);

        $response = $this->call('POST', '/detailprodg2/update', [
            '_token' => csrf_token(),
            'pk' => $detail->id_detail_prod_g2,
            'name' => 'qty_prod_g2',
            'value' => 20,
        ], [], [], ['HTTP_X-Requested-With' => 'XMLHttpRequest']);

        $this->seeInDatabase('detail_prod_g2s', [
            'id_detail_prod_g2' => $detail->id_detail_prod_g2,
            'qty_prod_g2' => 20,
        ]);
    }
}
