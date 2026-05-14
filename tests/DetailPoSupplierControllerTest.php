<?php

use App\detail_po_supplier, App\po_supplier, App\vendor, App\part_supplier;

class DetailPoSupplierControllerTest extends TestCase
{
    protected function createPoSupplier()
    {
        $vendor = vendor::create([
            'kode_vendor' => 'V001',
            'nama_vendor' => 'Vendor Test',
            'alamat_vendor' => 'Jakarta',
        ]);

        return po_supplier::create([
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
    }

    public function testIndexPageLoads()
    {
        $this->loginAs('admin');
        $po = $this->createPoSupplier();
        $this->visit('/detailpo/' . $po->id_po)
             ->see('Detail');
    }

    public function testCreatePageLoads()
    {
        $this->loginAs('admin');
        $po = $this->createPoSupplier();
        part_supplier::create([
            'part_number' => 'PS001',
            'part_name' => 'Part Test',
        ]);
        $this->visit('/detailpo/create/' . $po->id_po)
             ->see('Part Test');
    }

    public function testStoreCreatesDetail()
    {
        $this->loginAs('admin');
        $po = $this->createPoSupplier();

        $part = part_supplier::create([
            'part_number' => 'PS001',
            'part_name' => 'Part Test',
        ]);

        $this->post('/detailpo/create/' . $po->id_po, [
            '_token' => csrf_token(),
            'id_material' => $part->id_part_supplier,
            'qty_po' => 100,
            'harga_po' => 10000,
            'uom' => 'kg',
        ]);

        $this->assertRedirectedTo('/detailpo/' . $po->id_po);
        $this->seeInDatabase('detail_po_suppliers', [
            'id_po' => $po->id_po,
            'qty_po' => 100,
        ]);
    }

    public function testEditPageLoads()
    {
        $this->loginAs('admin');
        $po = $this->createPoSupplier();

        $part = part_supplier::create([
            'part_number' => 'PS001',
            'part_name' => 'Part Test',
        ]);

        $detail = detail_po_supplier::create([
            'id_po' => $po->id_po,
            'id_material' => $part->id_part_supplier,
            'qty_po' => 100,
            'harga_po' => 10000,
            'uom' => 'kg',
        ]);

        $this->visit('/detailpo/edit/' . $detail->id_detail_po)
             ->see('Edit');
    }

    public function testUpdateModifiesDetail()
    {
        $this->loginAs('admin');
        $po = $this->createPoSupplier();

        $part = part_supplier::create([
            'part_number' => 'PS001',
            'part_name' => 'Part Test',
        ]);

        $detail = detail_po_supplier::create([
            'id_po' => $po->id_po,
            'id_material' => $part->id_part_supplier,
            'qty_po' => 100,
            'harga_po' => 10000,
            'uom' => 'kg',
        ]);

        $this->post('/detailpo/edit/' . $detail->id_detail_po, [
            '_token' => csrf_token(),
            'id_material' => $part->id_part_supplier,
            'qty_po' => 200,
            'harga_po' => 15000,
            'uom' => 'pcs',
        ]);

        $this->assertRedirectedTo('/detailpo/' . $po->id_po);
        $this->seeInDatabase('detail_po_suppliers', [
            'id_detail_po' => $detail->id_detail_po,
            'qty_po' => 200,
            'harga_po' => 15000,
        ]);
    }

    public function testDeleteRemovesDetail()
    {
        $this->loginAs('admin');
        $po = $this->createPoSupplier();

        $part = part_supplier::create([
            'part_number' => 'PS001',
            'part_name' => 'Part Test',
        ]);

        $detail = detail_po_supplier::create([
            'id_po' => $po->id_po,
            'id_material' => $part->id_part_supplier,
            'qty_po' => 100,
            'harga_po' => 10000,
            'uom' => 'kg',
        ]);

        $this->get('/detailpo/delete/' . $detail->id_detail_po);

        $this->assertRedirectedTo('/detailpo/' . $po->id_po);
        $this->notSeeInDatabase('detail_po_suppliers', ['id_detail_po' => $detail->id_detail_po]);
    }

    public function testRequiresAuth()
    {
        $this->get('/detailpo/1');
        $this->assertRedirectedTo('/login');
    }
}
