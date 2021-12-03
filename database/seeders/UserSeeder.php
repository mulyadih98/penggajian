<?php

namespace Database\Seeders;

use App\Models\User;
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
            "name" => "admin",
            "email" => "admin@example.test",
            "password" => bcrypt("password"),
            "jabatan_id" => 1

        ];

        User::create($admin);
    }
}
