<?php

use App\part_customer;

class PartCustomerControllerTest extends TestCase
{
    public function testIndexPageLoads()
    {
        $this->loginAs('admin');
        $this->visit('/part_customer')
             ->see('Part Customer');
    }

    public function testIndexShowsParts()
    {
        $this->loginAs('admin');

        part_customer::create([
            'part_number' => 'PC001',
            'part_name' => 'Part Customer Test',
        ]);

        $this->visit('/part_customer')
             ->see('PC001')
             ->see('Part Customer Test');
    }

    public function testCreatePageLoads()
    {
        $this->loginAs('admin');
        $this->visit('/part_customer/create')
             ->see('Create');
    }

    public function testStoreCreatesPart()
    {
        $this->loginAs('admin');

        $this->post('/part_customer/create', [
            '_token' => csrf_token(),
            'part_number' => 'PC002',
            'part_name' => 'New Part Customer',
        ]);

        $this->assertRedirectedTo('/part_customer');
        $this->seeInDatabase('part_customers', [
            'part_number' => 'PC002',
            'part_name' => 'New Part Customer',
        ]);
    }

    public function testEditPageLoads()
    {
        $this->loginAs('admin');

        $part = part_customer::create([
            'part_number' => 'PC001',
            'part_name' => 'Part Customer Test',
        ]);

        $this->visit('/part_customer/edit/' . $part->id_part_customer)
             ->see('Edit')
             ->see('Part Customer Test');
    }

    public function testUpdateModifiesPart()
    {
        $this->loginAs('admin');

        $part = part_customer::create([
            'part_number' => 'PC001',
            'part_name' => 'Part Customer Test',
        ]);

        $this->post('/part_customer/edit/' . $part->id_part_customer, [
            '_token' => csrf_token(),
            'part_number' => 'PC001',
            'part_name' => 'Updated Part Customer',
        ]);

        $this->assertRedirectedTo('/part_customer');
        $this->seeInDatabase('part_customers', [
            'id_part_customer' => $part->id_part_customer,
            'part_name' => 'Updated Part Customer',
        ]);
    }

    public function testDeleteRemovesPart()
    {
        $this->loginAs('admin');

        $part = part_customer::create([
            'part_number' => 'DEL001',
            'part_name' => 'Delete Me',
        ]);

        $this->get('/part_customer/delete/' . $part->id_part_customer);

        $this->assertRedirectedTo('/part_customer');
        $this->notSeeInDatabase('part_customers', ['id_part_customer' => $part->id_part_customer]);
    }
}
