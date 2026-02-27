<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::create([
            'nama_admin' => 'Admin Utama',
            'email' => 'admin@senku.com',
            'password' => Hash::make('admin123'),
        ]);

        Admin::create([
            'nama_admin' => 'Admin Test',
            'email' => 'test@senku.com',
            'password' => Hash::make('test123'),
        ]);
    }
}
