<?php

namespace Database\Seeders;
use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Admin::create([
            'nama' => 'Admin Bimbel',
            'email' => 'admin@gmail.com',
            'password' => 'password123',
        ]);
    }
}
