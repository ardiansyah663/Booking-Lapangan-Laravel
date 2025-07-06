<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('fields', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->text('description');
            $table->decimal('price_per_hour', 10, 2);
            $table->string('location');
            $table->timestamps();
        });

        Schema::create('field_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('field_id')->constrained()->onDelete('cascade');
            $table->string('image_path');
            $table->timestamps();
        });

        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('field_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('address');
            $table->string('whatsapp_number');
            $table->dateTime('booking_time');
            $table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
        Schema::dropIfExists('field_images');
        Schema::dropIfExists('fields');
        Schema::dropIfExists('categories');
    }
};