<?php

class HomeControllerTest extends TestCase
{
    public function testDashboardPageLoads()
    {
        $this->loginAs('admin');
        $this->visit('/')
             ->see('dashboard');
    }

    public function testRequiresAuth()
    {
        $this->visit('/')
             ->seePageIs('/login');
    }
}
