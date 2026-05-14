<?php

class StoControllerTest extends TestCase
{
    public function testCreatePageLoads()
    {
        $this->loginAs('admin');
        $this->visit('/stog2/create')
             ->see('Create');
    }

    public function testRequiresAuth()
    {
        $this->visit('/stog2/create')
             ->seePageIs('/login');
    }
}
