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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sale')->default(0);
            $table->integer('price');
            $table->json('gallery_images')->nullable();
            $table->string('image')->nullable();
            $table->integer('number_sold')->default(0);
            $table->string('type')->default(0);
            $table->string('status')->default(1);
            $table->text('description')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->timestamps();
            // key
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
