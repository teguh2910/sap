<?php

use App\bank;

class BankControllerTest extends TestCase
{
    public function testIndexPageLoads()
    {
        $this->loginAs('admin');
        $this->visit('/bank')
             ->see('Bank');
    }

    public function testIndexShowsBanks()
    {
        $this->loginAs('admin');

        bank::create([
            'kode_bank' => 'BCA001',
            'nama_bank' => 'Bank BCA',
            'no_rek_bank' => '1234567890',
            'currency_bank' => 'IDR',
        ]);

        $this->visit('/bank')
             ->see('BCA001')
             ->see('Bank BCA');
    }

    public function testCreatePageLoads()
    {
        $this->loginAs('admin');
        $this->visit('/bank/create')
             ->see('Create');
    }

    public function testStoreCreatesBank()
    {
        $this->loginAs('admin');

        $this->post('/bank/create', [
            '_token' => csrf_token(),
            'kode_bank' => 'BNI001',
            'nama_bank' => 'Bank BNI',
            'no_rek_bank' => '9876543210',
            'currency_bank' => 'IDR',
        ]);

        $this->assertRedirectedTo('bank');
        $this->seeInDatabase('banks', [
            'kode_bank' => 'BNI001',
            'nama_bank' => 'Bank BNI',
        ]);
    }

    public function testEditPageLoads()
    {
        $this->loginAs('admin');

        $bank = bank::create([
            'kode_bank' => 'BCA001',
            'nama_bank' => 'Bank BCA',
            'no_rek_bank' => '1234567890',
            'currency_bank' => 'IDR',
        ]);

        $this->visit('/bank/edit/' . $bank->id_bank)
             ->see('Edit')
             ->see('Bank BCA');
    }

    public function testUpdateModifiesBank()
    {
        $this->loginAs('admin');

        $bank = bank::create([
            'kode_bank' => 'BCA001',
            'nama_bank' => 'Bank BCA',
            'no_rek_bank' => '1234567890',
            'currency_bank' => 'IDR',
        ]);

        $this->post('/bank/edit/' . $bank->id_bank, [
            '_token' => csrf_token(),
            'kode_bank' => 'BCA002',
            'nama_bank' => 'Bank BCA Updated',
            'no_rek_bank' => '1111111111',
            'currency_bank' => 'USD',
        ]);

        $this->assertRedirectedTo('bank');
        $this->seeInDatabase('banks', [
            'id_bank' => $bank->id_bank,
            'nama_bank' => 'Bank BCA Updated',
            'currency_bank' => 'USD',
        ]);
    }

    public function testDeleteRemovesBank()
    {
        $this->loginAs('admin');

        $bank = bank::create([
            'kode_bank' => 'DEL001',
            'nama_bank' => 'Delete Me',
            'no_rek_bank' => '0000000000',
            'currency_bank' => 'IDR',
        ]);

        $this->get('/bank/delete/' . $bank->id_bank);

        $this->assertRedirectedTo('bank');
        $this->notSeeInDatabase('banks', ['id_bank' => $bank->id_bank]);
    }

    public function testRequiresAuth()
    {
        $this->visit('/bank')
             ->seePageIs('/login');
    }
}
