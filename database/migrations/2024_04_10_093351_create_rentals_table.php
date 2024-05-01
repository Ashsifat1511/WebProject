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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->date('rentalDate');
            $table->date('returnDate');
            $table->double('quantity');
            $table->double('paid');
            $table->unsignedBigInteger('Item_itemID');
            $table->unsignedBigInteger('Customers_customerID');
            $table->boolean('isReturned')->default(false);
            $table->timestamps();

            $table->foreign('Item_itemID')->references('itemID')->on('items');
            $table->foreign('Customers_customerID')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
