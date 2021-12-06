<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            "nip" => "199807042112041001",
            "email" => "admin@example.test",
            "password" => bcrypt("password"),
            "jabatan_id" => 3,
            "role" => "admin"

        ];

        $admin = User::create($admin);

        UserDetail::create([
            "user_id" => $admin->id,
            "nama_lengkap" => "admin test",
            "tanggal_lahir" => now(),
            "tempat_lahir" => "location test",
            "alamat" => "location test",
            "no_telepon" => "081123123123",
            "agama" => "test"
        ]);
    }
}
