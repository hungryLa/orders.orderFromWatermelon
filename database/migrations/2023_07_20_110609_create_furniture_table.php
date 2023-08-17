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
        Schema::create('furniture', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('order_id');
            $table->string('description');
            $table->boolean('measurements')->default(false);
            $table->boolean('visualization')->default(false);
            $table->boolean('getting_started')->default(false);
            $table->boolean('cutting_order')->default(false);
            $table->boolean('assembling')->default(false);
            $table->boolean('delivery_installation')->default(false);
            $table->string('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('furniture');
    }
};
