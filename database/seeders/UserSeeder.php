<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role_id' => 5, // Admin
            'department_id' => 1, // Sales
        ]);

        User::create([
            'name' => 'Sales Person',
            'email' => 'sales@example.com',
            'password' => bcrypt('password'),
            'role_id' => 1, // Sales
            'department_id' => 1, // Sales
        ]);

        User::create([
            'name' => 'Warehouse Manager',
            'email' => 'warehouse@example.com',
            'password' => bcrypt('password'),
            'role_id' => 3, // Warehouse
            'department_id' => 2, // Warehouse
        ]);
    }
}
