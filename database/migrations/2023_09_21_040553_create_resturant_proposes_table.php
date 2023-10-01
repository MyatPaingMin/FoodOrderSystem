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
        Schema::create('resturant_proposes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('resturant_id');
            $table->string('image');
            $table->string('video');
            $table->string('new_product_name');
            $table->string('new_product_title');
            $table->string('new_product_introduction');
            $table->string('new_product_description');
            $table->string('new_product_price');
            $table->string('waiting_time');
            $table->boolean('new_food');
            $table->integer('status');
            $table->string('remark_from_admin');
            $table->foreign('resturant_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resturant_proposes');
    }
};
