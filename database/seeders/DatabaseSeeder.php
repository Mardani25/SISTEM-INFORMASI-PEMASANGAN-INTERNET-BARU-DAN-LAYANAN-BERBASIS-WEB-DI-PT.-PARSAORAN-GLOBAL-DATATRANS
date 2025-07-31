<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'], // cek email dulu biar ga dobel
            [
                'name' => 'linda',
                'telepon' => '085774141289',
                'alamat' => 'bangka buntu 2',
                'email' => 'linda@gmail.com',
                'password' => Hash::make('password'), // ganti sama password yang aman
                'role' => 'admin', // jika kamu pakai sistem role
            ]
        );
    }
}
