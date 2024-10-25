<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotosTable extends Migration
{
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained(); // foreign key to orders
            $table->string('photo_type'); // can be 'loaded' or 'delivered'
            $table->string('url'); // URL or path to the photo file
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('photos');
    }
}