<?php

use App\customer;

class CustomerControllerTest extends TestCase
{
    public function testIndexPageLoads()
    {
        $this->loginAs('admin');
        $this->visit('/customer')
             ->see('Customer');
    }

    public function testIndexShowsCustomers()
    {
        $this->loginAs('admin');

        customer::create([
            'kode_customer' => 'CUST001',
            'nama_customer' => 'PT Test Customer',
            'alamat_customer' => 'Jakarta',
        ]);

        $this->visit('/customer')
             ->see('CUST001')
             ->see('PT Test Customer');
    }

    public function testCreatePageLoads()
    {
        $this->loginAs('admin');
        $this->visit('/customer/create')
             ->see('Create');
    }

    public function testStoreCreatesCustomer()
    {
        $this->loginAs('admin');

        $this->post('/customer/create', [
            '_token' => csrf_token(),
            'kode_customer' => 'CUST002',
            'nama_customer' => 'PT New Customer',
            'alamat_customer' => 'Surabaya',
        ]);

        $this->assertRedirectedTo('customer');
        $this->seeInDatabase('customers', [
            'kode_customer' => 'CUST002',
            'nama_customer' => 'PT New Customer',
        ]);
    }

    public function testEditPageLoads()
    {
        $this->loginAs('admin');

        $customer = customer::create([
            'kode_customer' => 'CUST001',
            'nama_customer' => 'PT Test Customer',
            'alamat_customer' => 'Jakarta',
        ]);

        $this->visit('/customer/edit/' . $customer->id_customer)
             ->see('Edit')
             ->see('PT Test Customer');
    }

    public function testUpdateModifiesCustomer()
    {
        $this->loginAs('admin');

        $customer = customer::create([
            'kode_customer' => 'CUST001',
            'nama_customer' => 'PT Test Customer',
            'alamat_customer' => 'Jakarta',
        ]);

        $this->post('/customer/edit/' . $customer->id_customer, [
            '_token' => csrf_token(),
            'kode_customer' => 'CUST001',
            'nama_customer' => 'PT Updated Customer',
            'alamat_customer' => 'Bandung',
        ]);

        $this->assertRedirectedTo('customer');
        $this->seeInDatabase('customers', [
            'id_customer' => $customer->id_customer,
            'nama_customer' => 'PT Updated Customer',
            'alamat_customer' => 'Bandung',
        ]);
    }

    public function testDeleteRemovesCustomer()
    {
        $this->loginAs('admin');

        $customer = customer::create([
            'kode_customer' => 'DEL001',
            'nama_customer' => 'Delete Me',
            'alamat_customer' => 'Nowhere',
        ]);

        $this->get('/customer/delete/' . $customer->id_customer);

        $this->assertRedirectedTo('customer');
        $this->notSeeInDatabase('customers', ['id_customer' => $customer->id_customer]);
    }

    public function testRequiresAuth()
    {
        $this->visit('/customer')
             ->seePageIs('/login');
    }
}
