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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->string('purchaseDate');
            $table->integer('purchaseQuantity');
            $table->unsignedBigInteger('Item_itemID');
            $table->unsignedBigInteger('Customers_customerID');
            $table->double('payAmount');
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('Item_itemID')->references('itemID')->on('items');
            $table->foreign('Customers_customerID')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
