<?php

use App\cashflow;

class CashflowControllerTest extends TestCase
{
    public function testIndexPageLoads()
    {
        $this->loginAs('admin');
        $this->visit('/cashflow')
             ->see('Cash');
    }

    public function testCreatePageLoads()
    {
        $this->loginAs('admin');
        $this->visit('/cashflow/create')
             ->see('Create');
    }

    public function testIndexShowsCashflows()
    {
        $this->loginAs('admin');

        cashflow::create([
            'bank' => 'Bank BCA',
            'beginning_balance' => 1000000,
        ]);

        $this->visit('/cashflow')
             ->see('Bank BCA');
    }

    public function testRequiresAuth()
    {
        $this->visit('/cashflow')
             ->seePageIs('/login');
    }
}
