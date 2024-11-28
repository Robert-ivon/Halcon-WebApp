<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();  // This is the primary key, usually of type unsignedBigInteger
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            
            // Add the foreign key constraint properly
            $table->unsignedBigInteger('role_id')->default(1); // This should be an unsignedBigInteger
    
            // Foreign key relation to the 'roles' table
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
