<?php

use App\prod_g2, App\po_customer, App\customer, App\gudang_dua;

class ProdG2ControllerTest extends TestCase
{
    public function testIndexPageLoads()
    {
        $this->loginAs('admin');
        $this->visit('/prodg2')
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

        gudang_dua::create([
            'part_no' => 'GD001',
            'part_name' => 'Part GD',
            'category_part' => 'RM',
            'beginning_balance' => 100,
        ]);

        $this->visit('/prodg2/create')
             ->see('Create');
    }

    public function testStoreCreatesProdG2()
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

        gudang_dua::create([
            'part_no' => 'GD001',
            'part_name' => 'Part GD',
            'category_part' => 'RM',
            'beginning_balance' => 100,
        ]);

        $this->post('/prodg2/create', [
            '_token' => csrf_token(),
            'lot_prod_g2' => 'LOT001',
            'tgl_prod_g2' => '2023-07-20',
            'id_po_customer' => $po->id_po_customer,
        ]);

        $this->seeInDatabase('prod_g2s', [
            'lot_prod_g2' => 'LOT001',
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

        $prod = prod_g2::create([
            'lot_prod_g2' => 'LOT001',
            'tgl_prod_g2' => '2023-07-20',
            'id_po_customer' => $po->id_po_customer,
        ]);

        $this->visit('/prodg2/edit/' . $prod->id_prod_g2)
             ->see('Edit');
    }

    public function testUpdateModifiesProdG2()
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

        $this->post('/prodg2/edit/' . $prod->id_prod_g2, [
            '_token' => csrf_token(),
            'lot_prod_g2' => 'LOT002',
            'tgl_prod_g2' => '2023-07-25',
            'id_po_customer' => $po->id_po_customer,
        ]);

        $this->assertRedirectedTo('/prodg2');
        $this->seeInDatabase('prod_g2s', [
            'id_prod_g2' => $prod->id_prod_g2,
            'lot_prod_g2' => 'LOT002',
        ]);
    }

    public function testDeleteRemovesProdG2()
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

        $this->get('/prodg2/delete/' . $prod->id_prod_g2);

        $this->assertRedirectedTo('/prodg2');
        $this->notSeeInDatabase('prod_g2s', ['id_prod_g2' => $prod->id_prod_g2]);
    }

    public function testRequiresAuth()
    {
        $this->visit('/prodg2')
             ->seePageIs('/login');
    }
}