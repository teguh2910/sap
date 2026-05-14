<?php

use App\part_supplier;

class PartSupplierControllerTest extends TestCase
{
    public function testIndexPageLoads()
    {
        $this->loginAs('admin');
        $this->visit('/part_supplier')
             ->see('Part Supplier');
    }

    public function testIndexShowsParts()
    {
        $this->loginAs('admin');

        part_supplier::create([
            'part_number' => 'PS001',
            'part_name' => 'Part Test',
        ]);

        $this->visit('/part_supplier')
             ->see('PS001')
             ->see('Part Test');
    }

    public function testCreatePageLoads()
    {
        $this->loginAs('admin');
        $this->visit('/part_supplier/create')
             ->see('Create');
    }

    public function testStoreCreatesPart()
    {
        $this->loginAs('admin');

        $this->post('/part_supplier/create', [
            '_token' => csrf_token(),
            'part_number' => 'PS002',
            'part_name' => 'New Part',
        ]);

        $this->assertRedirectedTo('/part_supplier');
        $this->seeInDatabase('part_suppliers', [
            'part_number' => 'PS002',
            'part_name' => 'New Part',
        ]);
    }

    public function testEditPageLoads()
    {
        $this->loginAs('admin');

        $part = part_supplier::create([
            'part_number' => 'PS001',
            'part_name' => 'Part Test',
        ]);

        $this->visit('/part_supplier/edit/' . $part->id_part_supplier)
             ->see('Edit')
             ->see('Part Test');
    }

    public function testUpdateModifiesPart()
    {
        $this->loginAs('admin');

        $part = part_supplier::create([
            'part_number' => 'PS001',
            'part_name' => 'Part Test',
        ]);

        $this->post('/part_supplier/edit/' . $part->id_part_supplier, [
            '_token' => csrf_token(),
            'part_number' => 'PS001',
            'part_name' => 'Updated Part',
        ]);

        $this->assertRedirectedTo('/part_supplier');
        $this->seeInDatabase('part_suppliers', [
            'id_part_supplier' => $part->id_part_supplier,
            'part_name' => 'Updated Part',
        ]);
    }

    public function testDeleteRemovesPart()
    {
        $this->loginAs('admin');

        $part = part_supplier::create([
            'part_number' => 'DEL001',
            'part_name' => 'Delete Me',
        ]);

        $this->get('/part_supplier/delete/' . $part->id_part_supplier);

        $this->assertRedirectedTo('/part_supplier');
        $this->notSeeInDatabase('part_suppliers', ['id_part_supplier' => $part->id_part_supplier]);
    }
}
