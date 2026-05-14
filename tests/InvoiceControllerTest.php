<?php

use App\invoice, App\po_customer, App\customer, App\detail_invoice, App\part_customer;

class InvoiceControllerTest extends TestCase
{
    public function testIndexPageLoads()
    {
        $this->loginAs('admin');
        $this->visit('/invoice')
             ->see('Invoice');
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

        $this->visit('/invoice/create')
             ->see('Create');
    }

    public function testStoreCreatesInvoice()
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

        $this->post('/invoice/create', [
            '_token' => csrf_token(),
            'no_invoice' => 'INV001',
            'tgl_invoice' => '2023-07-20',
            'no_fp' => '010.000-23.12345678',
            'id_po_customer' => $po->id_po_customer,
        ]);

        $this->assertRedirectedTo('/invoice');
        $this->seeInDatabase('invoices', [
            'no_invoice' => 'INV001',
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

        $invoice = invoice::create([
            'no_invoice' => 'INV001',
            'tgl_invoice' => '2023-07-20',
            'no_fp' => '010.000-23.12345678',
            'id_po_customer' => $po->id_po_customer,
        ]);

        $this->visit('/invoice/edit/' . $invoice->id_invoice)
             ->see('Edit');
    }

    public function testUpdateModifiesInvoice()
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

        $invoice = invoice::create([
            'no_invoice' => 'INV001',
            'tgl_invoice' => '2023-07-20',
            'no_fp' => '010.000-23.12345678',
            'id_po_customer' => $po->id_po_customer,
        ]);

        $this->post('/invoice/edit/' . $invoice->id_invoice, [
            '_token' => csrf_token(),
            'no_invoice' => 'INV002',
            'tgl_invoice' => '2023-07-25',
            'no_fp' => '010.000-23.87654321',
            'id_po_customer' => $po->id_po_customer,
        ]);

        $this->assertRedirectedTo('/invoice');
        $this->seeInDatabase('invoices', [
            'id_invoice' => $invoice->id_invoice,
            'no_invoice' => 'INV002',
        ]);
    }

    public function testDeleteRemovesInvoice()
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

        $invoice = invoice::create([
            'no_invoice' => 'INV001',
            'tgl_invoice' => '2023-07-20',
            'no_fp' => '010.000-23.12345678',
            'id_po_customer' => $po->id_po_customer,
        ]);

        $this->get('/invoice/delete/' . $invoice->id_invoice);

        $this->assertRedirectedTo('/invoice');
        $this->notSeeInDatabase('invoices', ['id_invoice' => $invoice->id_invoice]);
    }

    public function testDetailCreatePageLoads()
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

        $invoice = invoice::create([
            'no_invoice' => 'INV001',
            'tgl_invoice' => '2023-07-20',
            'no_fp' => '010.000-23.12345678',
            'id_po_customer' => $po->id_po_customer,
        ]);

        part_customer::create([
            'part_number' => 'PN001',
            'part_name' => 'Part Test',
        ]);

        $this->visit('/invoice/detail/create/' . $invoice->id_invoice)
             ->see('Create');
    }

    public function testStoreDetailCreateCreatesDetailInvoice()
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

        $invoice = invoice::create([
            'no_invoice' => 'INV001',
            'tgl_invoice' => '2023-07-20',
            'no_fp' => '010.000-23.12345678',
            'id_po_customer' => $po->id_po_customer,
        ]);

        $part = part_customer::create([
            'part_number' => 'PN001',
            'part_name' => 'Part Test',
        ]);

        $this->visit('/invoice/detail/create/' . $invoice->id_invoice);
    }
}
