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
                "nama_jabatan" => "admin",
                "gaji_pokok" => 1500000
            ],
            [
                "nama_jabatan" => "guru",
                "gaji_pokok" => 1000000
            ]
        ];

        foreach($jabatans as $jabatan){
            Jabatan::create($jabatan);
        } 

    }
}
