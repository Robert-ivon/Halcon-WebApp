<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'Sales']);
        Role::create(['name' => 'Purchasing']);
        Role::create(['name' => 'Warehouse']);
        Role::create(['name' => 'Route']);
        Role::create(['name' => 'Admin']);
    }
}
