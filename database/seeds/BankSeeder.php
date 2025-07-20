<?php

namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create some default banks
        $banks = [
            [
                'kode_bank' => 'BCA001',
                'nama_bank' => 'Bank Central Asia',
                'alamat_bank' => 'Jakarta, Indonesia',
                'no_rek_bank' => '1234567890',
                'currency_bank' => 'IDR',
            ],
            [
                'kode_bank' => 'BNI001',
                'nama_bank' => 'Bank Negara Indonesia',
                'alamat_bank' => 'Jakarta, Indonesia',
                'no_rek_bank' => '0987654321',
                'currency_bank' => 'IDR',
            ],
            [
                'kode_bank' => 'BRI001',
                'nama_bank' => 'Bank Rakyat Indonesia',
                'alamat_bank' => 'Jakarta, Indonesia',
                'no_rek_bank' => '1122334455',
                'currency_bank' => 'IDR',
            ],
        ];

        foreach ($banks as $bank) {
            Bank::create($bank);
        }

        // Create additional random banks
        Bank::factory()->count(10)->create();
    }
}
