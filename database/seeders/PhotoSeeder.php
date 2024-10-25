<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Photo;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Photo::create([
            'order_id' => 1, // Linked to the first order
            'photo_type' => 'loaded',
            'url' => '/storage/photos/loaded1.jpg',
        ]);

        Photo::create([
            'order_id' => 1, // Linked to the first order
            'photo_type' => 'delivered',
            'url' => '/storage/photos/delivered1.jpg',
        ]);
    }
}
