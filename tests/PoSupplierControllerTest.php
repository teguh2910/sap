<?php

use App\po_supplier, App\vendor, App\detail_po_supplier, App\part_supplier;

class PoSupplierControllerTest extends TestCase
{
    public function testIndexPageLoads()
    {
        $this->loginAs('admin');
        $this->visit('/po')
             ->see('PO');
    }

    public function testCreatePageLoads()
    {
        $this->loginAs('admin');
        vendor::create([
            'kode_vendor' => 'V001',
            'nama_vendor' => 'Vendor Test',
            'alamat_vendor' => 'Jakarta',
        ]);
        $this->visit('/po/create')
             ->see('Vendor Test');
    }

    public function testStoreCreatesPo()
    {
        $this->loginAs('admin');

        $vendor = vendor::create([
            'kode_vendor' => 'V001',
            'nama_vendor' => 'Vendor Test',
            'alamat_vendor' => 'Jakarta',
        ]);

        $this->post('/po/create', [
            '_token' => csrf_token(),
            'id_vendor' => $vendor->id_vendor,
            'tgl_po' => '2023-07-15',
            'top' => '30 days',
            'delivery_by' => 'Truck',
            'delivery_date' => '2023-08-15',
            'quot_no' => 'Q001',
            'pr_no' => 'PR001',
            'vat' => 11,
            'note_po' => 'Test note',
        ]);

        $this->assertRedirectedTo('/po');
        $this->seeInDatabase('po_suppliers', [
            'id_vendor' => $vendor->id_vendor,
            'quot_no' => 'Q001',
        ]);
    }

    public function testEditPageLoads()
    {
        $this->loginAs('admin');

        $vendor = vendor::create([
            'kode_vendor' => 'V001',
            'nama_vendor' => 'Vendor Test',
            'alamat_vendor' => 'Jakarta',
        ]);

        $po = po_supplier::create([
            'id_vendor' => $vendor->id_vendor,
            'tgl_po' => '2023-07-15',
            'top' => '30 days',
            'delivery_by' => 'Truck',
            'delivery_date' => '2023-08-15',
            'quot_no' => 'Q001',
            'pr_no' => 'PR001',
            'vat' => 11,
            'note_po' => 'Test',
        ]);

        $this->visit('/po/edit/' . $po->id_po)
             ->see('Edit');
    }

    public function testUpdateModifiesPo()
    {
        $this->loginAs('admin');

        $vendor = vendor::create([
            'kode_vendor' => 'V001',
            'nama_vendor' => 'Vendor Test',
            'alamat_vendor' => 'Jakarta',
        ]);

        $po = po_supplier::create([
            'id_vendor' => $vendor->id_vendor,
            'tgl_po' => '2023-07-15',
            'top' => '30 days',
            'delivery_by' => 'Truck',
            'delivery_date' => '2023-08-15',
            'quot_no' => 'Q001',
            'pr_no' => 'PR001',
            'vat' => 11,
            'note_po' => 'Test',
        ]);

        $this->post('/po/edit/' . $po->id_po, [
            '_token' => csrf_token(),
            'id_vendor' => $vendor->id_vendor,
            'tgl_po' => '2023-07-20',
            'top' => '60 days',
            'delivery_by' => 'Ship',
            'delivery_date' => '2023-09-15',
            'quot_no' => 'Q002',
            'pr_no' => 'PR002',
            'vat' => 11,
            'note_po' => 'Updated',
        ]);

        $this->assertRedirectedTo('/po');
        $this->seeInDatabase('po_suppliers', [
            'id_po' => $po->id_po,
            'quot_no' => 'Q002',
            'top' => '60 days',
        ]);
    }

    public function testDeleteRemovesPo()
    {
        $this->loginAs('admin');

        $vendor = vendor::create([
            'kode_vendor' => 'V001',
            'nama_vendor' => 'Vendor Test',
            'alamat_vendor' => 'Jakarta',
        ]);

        $po = po_supplier::create([
            'id_vendor' => $vendor->id_vendor,
            'tgl_po' => '2023-07-15',
            'top' => '30 days',
            'delivery_by' => 'Truck',
            'delivery_date' => '2023-08-15',
            'quot_no' => 'Q001',
            'pr_no' => 'PR001',
            'vat' => 11,
            'note_po' => 'Test',
        ]);

        $this->get('/po/delete/' . $po->id_po);

        $this->assertRedirectedTo('/po');
        $this->notSeeInDatabase('po_suppliers', ['id_po' => $po->id_po]);
    }

    public function testRequiresAuth()
    {
        $this->visit('/po')
             ->seePageIs('/login');
    }
}
