<?php

use App\detail_prod_g1, App\prod_g1, App\gudang_satu, App\po_customer, App\customer;

class DetailProdG1ControllerTest extends TestCase
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

        $prod = prod_g1::create([
            'lot_prod_g1' => 'LOT001',
            'tgl_prod_g1' => '2023-07-20',
            'id_po_customer' => $po->id_po_customer,
        ]);

        $this->visit('/detailprodg1/' . $prod->id_prod_g1)
             ->see('Detail');
    }

    public function testStoreCreatesDetailProdG1()
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

        $prod = prod_g1::create([
            'lot_prod_g1' => 'LOT001',
            'tgl_prod_g1' => '2023-07-20',
            'id_po_customer' => $po->id_po_customer,
        ]);

        $gudang = gudang_satu::create([
            'part_no' => 'GS001',
            'part_name' => 'Part GS',
            'category_part' => 'RM',
            'beginning_balance' => 100,
        ]);

        $this->post('/detailprodg1/create', [
            '_token' => csrf_token(),
            'id_prod_g1' => $prod->id_prod_g1,
            'id_gudang_satu_1' => $gudang->id_gudang_satu,
            'qty_prod_g1_1' => 10,
            'submit_fg' => 'submit_fg',
        ]);

        $this->assertRedirectedTo('/prodg1');
        $this->seeInDatabase('detail_prod_g1s', [
            'id_prod_g1' => $prod->id_prod_g1,
            'id_gudang_satu' => $gudang->id_gudang_satu,
            'qty_prod_g1' => 10,
        ]);
    }

    public function testUpdateDetailProdG1ViaAjax()
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

        $prod = prod_g1::create([
            'lot_prod_g1' => 'LOT001',
            'tgl_prod_g1' => '2023-07-20',
            'id_po_customer' => $po->id_po_customer,
        ]);

        $gudang = gudang_satu::create([
            'part_no' => 'GS001',
            'part_name' => 'Part GS',
            'category_part' => 'RM',
            'beginning_balance' => 100,
        ]);

        $detail = detail_prod_g1::create([
            'id_prod_g1' => $prod->id_prod_g1,
            'id_gudang_satu' => $gudang->id_gudang_satu,
            'qty_prod_g1' => 10,
        ]);

        $response = $this->call('POST', '/detailprodg1/update', [
            '_token' => csrf_token(),
            'pk' => $detail->id_detail_prod_g1,
            'name' => 'qty_prod_g1',
            'value' => 20,
        ], [], [], ['HTTP_X-Requested-With' => 'XMLHttpRequest']);

        $this->seeInDatabase('detail_prod_g1s', [
            'id_detail_prod_g1' => $detail->id_detail_prod_g1,
            'qty_prod_g1' => 20,
        ]);
    }
}
