<?php

use App\prod_g1, App\po_customer, App\customer, App\gudang_satu;

class ProdG1ControllerTest extends TestCase
{
    public function testIndexPageLoads()
    {
        $this->loginAs('admin');
        $this->visit('/prodg1')
             ->see('Prod');
    }

    public function testCreatePageLoads()
    {
        $this->loginAs('admin');

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

        gudang_satu::create([
            'part_no' => 'GS001',
            'part_name' => 'Part GS',
            'category_part' => 'RM',
            'beginning_balance' => 100,
        ]);

        $this->visit('/prodg1/create')
             ->see('Create');
    }

    public function testStoreCreatesProdG1()
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

        gudang_satu::create([
            'part_no' => 'GS001',
            'part_name' => 'Part GS',
            'category_part' => 'RM',
            'beginning_balance' => 100,
        ]);

        $this->post('/prodg1/create', [
            '_token' => csrf_token(),
            'lot_prod_g1' => 'LOT001',
            'tgl_prod_g1' => '2023-07-20',
            'id_po_customer' => $po->id_po_customer,
        ]);

        $this->seeInDatabase('prod_g1s', [
            'lot_prod_g1' => 'LOT001',
            'id_po_customer' => $po->id_po_customer,
        ]);
    }

    public function testEditPageLoads()
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

        $this->visit('/prodg1/edit/' . $prod->id_prod_g1)
             ->see('Edit');
    }

    public function testUpdateModifiesProdG1()
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

        $this->post('/prodg1/edit/' . $prod->id_prod_g1, [
            '_token' => csrf_token(),
            'lot_prod_g1' => 'LOT002',
            'tgl_prod_g1' => '2023-07-25',
            'id_po_customer' => $po->id_po_customer,
        ]);

        $this->assertRedirectedTo('/prodg1');
        $this->seeInDatabase('prod_g1s', [
            'id_prod_g1' => $prod->id_prod_g1,
            'lot_prod_g1' => 'LOT002',
        ]);
    }

    public function testDeleteRemovesProdG1()
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

        $this->get('/prodg1/delete/' . $prod->id_prod_g1);

        $this->assertRedirectedTo('/prodg1');
        $this->notSeeInDatabase('prod_g1s', ['id_prod_g1' => $prod->id_prod_g1]);
    }

    public function testRequiresAuth()
    {
        $this->visit('/prodg1')
             ->seePageIs('/login');
    }
}