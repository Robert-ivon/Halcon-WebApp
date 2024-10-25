<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::create([
            'invoice_number' => 'INV0001',
            'user_id' => 2, // Sales Person
            'status' => 'Ordered',
            'delivery_address' => '123 Customer St, City',
            'notes' => 'Handle with care',
        ]);

        Order::create([
            'invoice_number' => 'INV0002',
            'user_id' => 2, // Sales Person
            'status' => 'In process',
            'delivery_address' => '456 Another Rd, Town',
            'notes' => 'Urgent delivery',
        ]);
    }
}
