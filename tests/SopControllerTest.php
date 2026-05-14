<?php

use App\sop;

class SopControllerTest extends TestCase
{
    public function testIndexPageLoads()
    {
        $this->loginAs('admin');
        $this->visit('/sop')
             ->see('SOP');
    }

    public function testIndexShowsSops()
    {
        $this->loginAs('admin');

        sop::create([
            'nama_sop' => 'SOP Test',
            'file_sop' => 'test.pdf',
        ]);

        $this->visit('/sop')
             ->see('SOP Test');
    }

    public function testCreatePageLoads()
    {
        $this->loginAs('admin');
        $this->visit('/sop/create')
             ->see('Create');
    }

    public function testRequiresAuth()
    {
        $this->visit('/sop')
             ->seePageIs('/login');
    }
}
