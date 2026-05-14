<?php

class Stog1ControllerTest extends TestCase
{
    public function testCreatePageLoads()
    {
        $this->loginAs('admin');
        $this->visit('/stog1/create')
             ->see('Create');
    }

    public function testRequiresAuth()
    {
        $this->visit('/stog1/create')
             ->seePageIs('/login');
    }
}
