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
            $table->smallInteger('type_address');
            $table->string('address');
            $table->string('color')->nullable();
            $table->smallInteger('type_payment');
            $table->unsignedInteger('price');
            $table->unsignedInteger('delivery_price')->nullable()->default(0);
            $table->date('deadline_delivery');
            $table->unsignedInteger('deposit')->nullable()->default(0);
            $table->unsignedInteger('lifting_price')->nullable()->default(0);
            $table->unsignedInteger('assembly_price')->nullable()->default(0);
            $table->unsignedInteger('rest_amount')->nullable()->default(0);
            $table->boolean('is_shipped')->default(false);
            $table->boolean('contract');
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
