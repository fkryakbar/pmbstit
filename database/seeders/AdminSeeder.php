<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'administrator',
            'email' => 'administrator',
            'role' => 'admin',
            'password' => bcrypt('asammanis')
        ]);
        User::create([
            'name' => 'Ahmad Fikri Akbar',
            'email' => 'fikriafa289@gmail.com',
            'role' => 'mahasiswa',
            'password' => bcrypt(123)
        ]);
    }
}
