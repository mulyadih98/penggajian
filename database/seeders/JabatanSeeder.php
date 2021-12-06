<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jabatans = [
            [
                "nama_jabatan" => "guru",
                "gaji_pokok" => 2000000,
                "uang_transport" => 150000,
                "uang_makan" => 300000
            ],
            [
                "nama_jabatan" => "kepala sekolah",
                "gaji_pokok" => 3500000,
                "uang_transport" => 200000,
                "uang_makan" => 350000
            ],
            [
                "nama_jabatan" => "admin",
                "gaji_pokok" => 2500000,
                "uang_transport" => 100000,
                "uang_makan" => 300000
            ],
        ];

        foreach($jabatans as $jabatan){
            Jabatan::create($jabatan);
        } 

    }
}
