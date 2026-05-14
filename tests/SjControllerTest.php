<?php

use App\sj, App\truk, App\gudang_dua;

class SjControllerTest extends TestCase
{
    public function testIndexPageLoads()
    {
        $this->loginAs('admin');
        $this->visit('/sjg2')
             ->see('SJ');
    }

    public function testCreatePageLoads()
    {
        $this->loginAs('admin');

        gudang_dua::create([
            'part_no' => 'GD001',
            'part_name' => 'Part FG',
            'category_part' => 'fg',
            'beginning_balance' => 50,
        ]);

        truk::create([
            'kode_truk' => 'TRK001',
            'plat_no' => 'B1234CD',
            'driver' => 'Truk Driver',
        ]);

        $this->visit('/sjg2/create')
             ->see('Create');
    }

    public function testStoreCreatesSj()
    {
        $this->loginAs('admin');

        $gudang = gudang_dua::create([
            'part_no' => 'GD001',
            'part_name' => 'Part FG',
            'category_part' => 'fg',
            'beginning_balance' => 50,
        ]);

        $truk = truk::create([
            'kode_truk' => 'TRK001',
            'plat_no' => 'B1234CD',
            'driver' => 'Truk Driver',
        ]);

        $this->post('/sjg2/create', [
            '_token' => csrf_token(),
            'id_gudang_dua' => $gudang->id_gudang_dua,
            'qty_sj' => 10,
            'tgl_sj' => '2023-07-20',
            'id_truk' => $truk->id_truk,
        ]);

        $this->assertRedirectedTo('/sjg2');
        $this->seeInDatabase('sjs', [
            'id_gudang_dua' => $gudang->id_gudang_dua,
            'qty_sj' => 10,
        ]);
    }

    public function testEditPageLoads()
    {
        $this->loginAs('admin');

        $gudang = gudang_dua::create([
            'part_no' => 'GD001',
            'part_name' => 'Part FG',
            'category_part' => 'fg',
            'beginning_balance' => 50,
        ]);

        $truk = truk::create([
            'kode_truk' => 'TRK001',
            'plat_no' => 'B1234CD',
            'driver' => 'Truk Driver',
        ]);

        $sj = sj::create([
            'id_gudang_dua' => $gudang->id_gudang_dua,
            'qty_sj' => 10,
            'tgl_sj' => '2023-07-20',
            'id_truk' => $truk->id_truk,
        ]);

        $this->visit('/sjg2/edit/' . $sj->id_sj)
             ->see('Edit');
    }

    public function testDeleteRemovesSj()
    {
        $this->loginAs('admin');

        $gudang = gudang_dua::create([
            'part_no' => 'GD001',
            'part_name' => 'Part FG',
            'category_part' => 'fg',
            'beginning_balance' => 50,
        ]);

        $truk = truk::create([
            'kode_truk' => 'TRK001',
            'plat_no' => 'B1234CD',
            'driver' => 'Truk Driver',
        ]);

        $sj = sj::create([
            'id_gudang_dua' => $gudang->id_gudang_dua,
            'qty_sj' => 10,
            'tgl_sj' => '2023-07-20',
            'id_truk' => $truk->id_truk,
        ]);

        $this->get('/sjg2/delete/' . $sj->id_sj);

        $this->assertRedirectedTo('/sjg2');
        $this->notSeeInDatabase('sjs', ['id_sj' => $sj->id_sj]);
    }

    public function testRequiresAuth()
    {
        $this->visit('/sjg2')
             ->seePageIs('/login');
    }
}
