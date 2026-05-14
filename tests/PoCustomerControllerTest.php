<?php

use App\po_customer, App\customer, App\part_customer;

class PoCustomerControllerTest extends TestCase
{
    public function testIndexPageLoads()
    {
        $this->loginAs('admin');
        $this->visit('/po_customer')
             ->see('PO Customer');
    }

    public function testCreatePageLoads()
    {
        $this->loginAs('admin');
        customer::create([
            'kode_customer' => 'C001',
            'nama_customer' => 'Customer Test',
            'alamat_customer' => 'Jakarta',
        ]);
        $this->visit('/po_customer/create')
             ->see('Customer Test');
    }

    public function testStoreCreatesPoCustomer()
    {
        $this->loginAs('admin');

        $customer = customer::create([
            'kode_customer' => 'C001',
            'nama_customer' => 'Customer Test',
            'alamat_customer' => 'Jakarta',
        ]);

        $this->post('/po_customer/create', [
            '_token' => csrf_token(),
            'no_po_customer' => 'POC001',
            'id_customer' => $customer->id_customer,
            'tgl_po_customer' => '2023-07-15',
        ]);

        $this->assertRedirectedTo('/po_customer');
        $this->seeInDatabase('po_customers', [
            'no_po_customer' => 'POC001',
            'id_customer' => $customer->id_customer,
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
            'id_customer' => $customer->id_customer,
            'tgl_po_customer' => '2023-07-15',
        ]);

        $this->visit('/po_customer/edit/' . $po->id_po_customer)
             ->see('Edit');
    }

    public function testUpdateModifiesPoCustomer()
    {
        $this->loginAs('admin');

        $customer = customer::create([
            'kode_customer' => 'C001',
            'nama_customer' => 'Customer Test',
            'alamat_customer' => 'Jakarta',
        ]);

        $po = po_customer::create([
            'no_po_customer' => 'POC001',
            'id_customer' => $customer->id_customer,
            'tgl_po_customer' => '2023-07-15',
        ]);

        $this->post('/po_customer/edit/' . $po->id_po_customer, [
            '_token' => csrf_token(),
            'no_po_customer' => 'POC002',
            'id_customer' => $customer->id_customer,
        ]);

        $this->assertRedirectedTo('/po_customer');
        $this->seeInDatabase('po_customers', [
            'id_po_customer' => $po->id_po_customer,
            'no_po_customer' => 'POC002',
        ]);
    }

    public function testDeleteRemovesPoCustomer()
    {
        $this->loginAs('admin');

        $customer = customer::create([
            'kode_customer' => 'C001',
            'nama_customer' => 'Customer Test',
            'alamat_customer' => 'Jakarta',
        ]);

        $po = po_customer::create([
            'no_po_customer' => 'POC001',
            'id_customer' => $customer->id_customer,
            'tgl_po_customer' => '2023-07-15',
        ]);

        $this->get('/po_customer/delete/' . $po->id_po_customer);

        $this->assertRedirectedTo('/po_customer');
        $this->notSeeInDatabase('po_customers', ['id_po_customer' => $po->id_po_customer]);
    }

    public function testRequiresAuth()
    {
        $this->visit('/po_customer')
             ->seePageIs('/login');
    }
}
