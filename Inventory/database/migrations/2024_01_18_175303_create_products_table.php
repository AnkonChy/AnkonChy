<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->constrained()->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedBigInteger('category_id')->constrained()->on('categories')->cascadeOnUpdate()->cascadeOnDelete();

            $table->string('name', 100);
            $table->string('price', 50);
            $table->string('unit', 50);
            $table->string('img_url', 150);
            $table->timestamps();
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
