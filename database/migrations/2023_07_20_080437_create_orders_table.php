<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('type');
            $table->string('title');
            $table->string('full_name');
            $table->string('phone_number');
            $table->string('address');
            $table->string('color')->nullable();
            $table->unsignedInteger('price');
            $table->unsignedInteger('delivery_price')->nullable();
            $table->unsignedInteger('deposit')->nullable();
            $table->unsignedInteger('rest_amount')->nullable();
            $table->boolean('contract')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};