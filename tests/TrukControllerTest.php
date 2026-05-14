<?php

use App\truk;

class TrukControllerTest extends TestCase
{
    public function testIndexPageLoads()
    {
        $this->loginAs('admin');
        $this->visit('/truk')
             ->see('Truk');
    }

    public function testIndexShowsTruks()
    {
        $this->loginAs('admin');

        truk::create([
            'kode_truk' => 'TRK001',
            'plat_no' => 'B 1234 ABC',
            'driver' => 'John Driver',
        ]);

        $this->visit('/truk')
             ->see('TRK001')
             ->see('B 1234 ABC');
    }

    public function testCreatePageLoads()
    {
        $this->loginAs('admin');
        $this->visit('/truk/create')
             ->see('Create');
    }

    public function testStoreCreatesTruk()
    {
        $this->loginAs('admin');

        $this->post('/truk/create', [
            '_token' => csrf_token(),
            'kode_truk' => 'TRK002',
            'plat_no' => 'B 5678 XYZ',
            'driver' => 'Jane Driver',
        ]);

        $this->assertRedirectedTo('/truk');
        $this->seeInDatabase('truks', [
            'kode_truk' => 'TRK002',
            'plat_no' => 'B 5678 XYZ',
        ]);
    }

    public function testEditPageLoads()
    {
        $this->loginAs('admin');

        $truk = truk::create([
            'kode_truk' => 'TRK001',
            'plat_no' => 'B 1234 ABC',
            'driver' => 'John Driver',
        ]);

        $this->visit('/truk/edit/' . $truk->id_truk)
             ->see('Edit');
    }

    public function testUpdateModifiesTruk()
    {
        $this->loginAs('admin');

        $truk = truk::create([
            'kode_truk' => 'TRK001',
            'plat_no' => 'B 1234 ABC',
            'driver' => 'John Driver',
        ]);

        $this->post('/truk/edit/' . $truk->id_truk, [
            '_token' => csrf_token(),
            'kode_truk' => 'TRK001',
            'plat_no' => 'B 9999 ZZZ',
            'driver' => 'Updated Driver',
        ]);

        $this->assertRedirectedTo('/truk');
        $this->seeInDatabase('truks', [
            'id_truk' => $truk->id_truk,
            'plat_no' => 'B 9999 ZZZ',
            'driver' => 'Updated Driver',
        ]);
    }

    public function testDeleteRemovesTruk()
    {
        $this->loginAs('admin');

        $truk = truk::create([
            'kode_truk' => 'DEL001',
            'plat_no' => 'B 0000 DEL',
            'driver' => 'Delete Me',
        ]);

        $this->get('/truk/delete/' . $truk->id_truk);

        $this->assertRedirectedTo('/truk');
        $this->notSeeInDatabase('truks', ['id_truk' => $truk->id_truk]);
    }

    public function testRequiresAuth()
    {
        $this->visit('/truk')
             ->seePageIs('/login');
    }
}
