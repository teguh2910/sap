<?php

use App\vendor;

class VendorControllerTest extends TestCase
{
    public function testIndexPageLoads()
    {
        $this->loginAs('admin');
        $this->visit('/vendor')
             ->see('Vendor');
    }

    public function testIndexShowsVendors()
    {
        $this->loginAs('admin');

        vendor::create([
            'kode_vendor' => 'VND001',
            'nama_vendor' => 'PT Test Vendor',
            'alamat_vendor' => 'Jakarta',
        ]);

        $this->visit('/vendor')
             ->see('VND001')
             ->see('PT Test Vendor');
    }

    public function testCreatePageLoads()
    {
        $this->loginAs('admin');
        $this->visit('/vendor/create')
             ->see('Create');
    }

    public function testStoreCreatesVendor()
    {
        $this->loginAs('admin');

        $this->post('/vendor/create', [
            '_token' => csrf_token(),
            'kode_vendor' => 'VND002',
            'nama_vendor' => 'PT New Vendor',
            'alamat_vendor' => 'Surabaya',
        ]);

        $this->assertRedirectedTo('vendor');
        $this->seeInDatabase('vendors', [
            'kode_vendor' => 'VND002',
            'nama_vendor' => 'PT New Vendor',
        ]);
    }

    public function testEditPageLoads()
    {
        $this->loginAs('admin');

        $vendor = vendor::create([
            'kode_vendor' => 'VND001',
            'nama_vendor' => 'PT Test Vendor',
            'alamat_vendor' => 'Jakarta',
        ]);

        $this->visit('/vendor/edit/' . $vendor->id_vendor)
             ->see('Edit')
             ->see('PT Test Vendor');
    }

    public function testUpdateModifiesVendor()
    {
        $this->loginAs('admin');

        $vendor = vendor::create([
            'kode_vendor' => 'VND001',
            'nama_vendor' => 'PT Test Vendor',
            'alamat_vendor' => 'Jakarta',
        ]);

        $this->post('/vendor/edit/' . $vendor->id_vendor, [
            '_token' => csrf_token(),
            'kode_vendor' => 'VND001',
            'nama_vendor' => 'PT Updated Vendor',
            'alamat_vendor' => 'Bandung',
        ]);

        $this->assertRedirectedTo('vendor');
        $this->seeInDatabase('vendors', [
            'id_vendor' => $vendor->id_vendor,
            'nama_vendor' => 'PT Updated Vendor',
        ]);
    }

    public function testDeleteRemovesVendor()
    {
        $this->loginAs('admin');

        $vendor = vendor::create([
            'kode_vendor' => 'DEL001',
            'nama_vendor' => 'Delete Me',
            'alamat_vendor' => 'Nowhere',
        ]);

        $this->get('/vendor/delete/' . $vendor->id_vendor);

        $this->assertRedirectedTo('vendor');
        $this->notSeeInDatabase('vendors', ['id_vendor' => $vendor->id_vendor]);
    }

    public function testRequiresAuth()
    {
        $this->visit('/vendor')
             ->seePageIs('/login');
    }
}
