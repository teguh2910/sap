<?php

use App\gudang_dua;

class GudangDuaControllerTest extends TestCase
{
    public function testIndexPageLoads()
    {
        $this->loginAs('admin');
        $this->visit('/gudangdua')
             ->see('Gudang');
    }

    public function testIndexShowsData()
    {
        $this->loginAs('admin');

        gudang_dua::create([
            'part_no' => 'GD001',
            'part_name' => 'Part Gudang Dua',
            'category_part' => 'FG',
            'beginning_balance' => 50,
        ]);

        $this->visit('/gudangdua')
             ->see('GD001')
             ->see('Part Gudang Dua');
    }

    public function testCreatePageLoads()
    {
        $this->loginAs('admin');
        $this->visit('/gudangdua/create')
             ->see('Create');
    }

    public function testRequiresAuth()
    {
        $this->visit('/gudangdua')
             ->seePageIs('/login');
    }
}
