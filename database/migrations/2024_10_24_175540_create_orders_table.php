<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number')->unique(); // unique invoice number
            $table->foreignId('user_id')->constrained(); // foreign key to users
            $table->enum('status', ['Ordered', 'In process', 'In route', 'Delivered']); // status of the order
            $table->text('notes')->nullable(); // optional field for extra information
            $table->string('delivery_address'); // delivery address for the order
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}