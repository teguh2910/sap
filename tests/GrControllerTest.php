<?php

use App\gr, App\po_supplier, App\detail_po_supplier, App\part_supplier, App\vendor;

class GrControllerTest extends TestCase
{
    public function testIndexPageLoads()
    {
        $this->loginAs('admin');
        $this->visit('/gr')
             ->see('GR');
    }

    public function testCreatePageLoads()
    {
        $this->loginAs('admin');
        $this->visit('/gr/create')
             ->see('Create');
    }

    public function testRequiresAuth()
    {
        $this->visit('/gr')
             ->seePageIs('/login');
    }
}
