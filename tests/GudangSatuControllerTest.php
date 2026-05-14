<?php

use App\gudang_satu;

class GudangSatuControllerTest extends TestCase
{
    public function testIndexPageLoads()
    {
        $this->loginAs('admin');
        $this->visit('/gudangsatu')
             ->see('Gudang');
    }

    public function testCreatePageLoads()
    {
        $this->loginAs('admin');
        $this->visit('/gudangsatu/create')
             ->see('Create');
    }

    public function testFilterStokPageLoads()
    {
        $this->loginAs('admin');
        $this->visit('/filter_gudang_satu')
             ->see('Filter');
    }

    public function testRequiresAuth()
    {
        $this->visit('/gudangsatu')
             ->seePageIs('/login');
    }
}
