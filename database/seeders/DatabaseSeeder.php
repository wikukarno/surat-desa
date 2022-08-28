<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // buat akun admin
        User::create([
            'name' => 'Lurah',
            'email' => 'lurah@gmail.com',
            'password' => bcrypt('123456'),
            'roles' => 'Lurah',
            'no_telephone' => '087823432323',
        ]);

        // buat akun staff
        User::create([
            'name' => 'Staff',
            'email' => 'staff@gmail.com',
            'password' => bcrypt('123456'),
            'roles' => 'Staff',
            'no_telephone' => '087823432323',
        ]);
    }
}
