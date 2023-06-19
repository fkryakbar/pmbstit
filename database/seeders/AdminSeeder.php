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
            'name' => env('SECRET_NAME'),
            'email' => env('SECRET_EMAIL'),
            'role' => 'admin',
            'password' => bcrypt(env('SECRET_PASSWORD'))
        ]);
    }
}
