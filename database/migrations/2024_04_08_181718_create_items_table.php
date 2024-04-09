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
        Schema::create('items', function (Blueprint $table) {
            $table->id('itemID');
            $table->string('itemName');
            $table->integer('stock');
            $table->enum('rentalOrSale', ['Rental', 'Sale']);
            $table->double('salePrice')->nullable();
            $table->double('rentRate')->nullable();
            $table->string('photo')->nullable();
            $table->enum('itemType', ['Electronics', 'Gaming', 'Furniture', 'Books', 'Others']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
