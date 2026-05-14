<?php

use App\detail_po_customer, App\po_customer, App\customer, App\part_customer;

class DetailPoCustomerControllerTest extends TestCase
{
    protected function createPoCustomer()
    {
        $customer = customer::create([
            'kode_customer' => 'C001',
            'nama_customer' => 'Customer Test',
            'alamat_customer' => 'Jakarta',
        ]);

        return po_customer::create([
            'no_po_customer' => 'POC001',
            'id_customer' => $customer->id_customer,
            'tgl_po_customer' => '2023-07-15',
        ]);
    }

    public function testIndexPageLoads()
    {
        $this->loginAs('admin');
        $po = $this->createPoCustomer();
        $this->visit('/detailpocustomer/' . $po->id_po_customer)
             ->see('Detail');
    }

    public function testCreatePageLoads()
    {
        $this->loginAs('admin');
        $po = $this->createPoCustomer();
        part_customer::create([
            'part_number' => 'PC001',
            'part_name' => 'Part Customer Test',
        ]);
        $this->visit('/detailpocustomer/create/' . $po->id_po_customer)
             ->see('Part Customer Test');
    }

    public function testStoreCreatesDetail()
    {
        $this->loginAs('admin');
        $po = $this->createPoCustomer();

        $part = part_customer::create([
            'part_number' => 'PC001',
            'part_name' => 'Part Customer Test',
        ]);

        $this->post('/detailpocustomer/create/' . $po->id_po_customer, [
            '_token' => csrf_token(),
            'id_part_customer' => $part->id_part_customer,
            'qty_po_customer' => 50,
            'harga_po_customer' => 20000,
            'uom' => 'pcs',
        ]);

        $this->assertRedirectedTo('/detailpocustomer/' . $po->id_po_customer);
        $this->seeInDatabase('detail_po_customers', [
            'id_po_customer' => $po->id_po_customer,
            'qty_po_customer' => 50,
        ]);
    }

    public function testEditPageLoads()
    {
        $this->loginAs('admin');
        $po = $this->createPoCustomer();

        $part = part_customer::create([
            'part_number' => 'PC001',
            'part_name' => 'Part Customer Test',
        ]);

        $detail = detail_po_customer::create([
            'id_po_customer' => $po->id_po_customer,
            'id_part_customer' => $part->id_part_customer,
            'qty_po_customer' => 50,
            'harga_po_customer' => 20000,
            'uom' => 'pcs',
        ]);

        $this->visit('/detailpocustomer/edit/' . $detail->id_detail_po_customers)
             ->see('Edit');
    }

    public function testUpdateModifiesDetail()
    {
        $this->loginAs('admin');
        $po = $this->createPoCustomer();

        $part = part_customer::create([
            'part_number' => 'PC001',
            'part_name' => 'Part Customer Test',
        ]);

        $detail = detail_po_customer::create([
            'id_po_customer' => $po->id_po_customer,
            'id_part_customer' => $part->id_part_customer,
            'qty_po_customer' => 50,
            'harga_po_customer' => 20000,
            'uom' => 'pcs',
        ]);

        $this->post('/detailpocustomer/edit/' . $detail->id_detail_po_customers, [
            '_token' => csrf_token(),
            'id_part_customer' => $part->id_part_customer,
            'qty_po_customer' => 100,
            'harga_po_customer' => 25000,
            'uom' => 'kg',
        ]);

        $this->assertRedirectedTo('/detailpocustomer/' . $po->id_po_customer);
        $this->seeInDatabase('detail_po_customers', [
            'id_detail_po_customers' => $detail->id_detail_po_customers,
            'qty_po_customer' => 100,
        ]);
    }

    public function testDeleteRemovesDetail()
    {
        $this->loginAs('admin');
        $po = $this->createPoCustomer();

        $part = part_customer::create([
            'part_number' => 'PC001',
            'part_name' => 'Part Customer Test',
        ]);

        $detail = detail_po_customer::create([
            'id_po_customer' => $po->id_po_customer,
            'id_part_customer' => $part->id_part_customer,
            'qty_po_customer' => 50,
            'harga_po_customer' => 20000,
            'uom' => 'pcs',
        ]);

        $this->get('/detailpocustomer/delete/' . $detail->id_detail_po_customers);

        $this->assertRedirectedTo('/detailpocustomer/' . $po->id_po_customer);
        $this->notSeeInDatabase('detail_po_customers', ['id_detail_po_customers' => $detail->id_detail_po_customers]);
    }

    public function testRequiresAuth()
    {
        $this->get('/detailpocustomer/1');
        $this->assertRedirectedTo('/login');
    }
}
