<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = [
            'name' => 'Admin',
            'email' => 'admin@digital-gate.com',
            'password' => bcrypt('admin'),
            'role' => 1
        ];

        User::updateOrCreate(['email' => $admin['email']], $admin);
    }
}
