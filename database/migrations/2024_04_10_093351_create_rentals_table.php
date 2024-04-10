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
            $table->id('rentalID');
            $table->date('rentalDate');
            $table->date('returnDate')->nullable();
            $table->double('quantity');
            $table->double('paid')->nullable();
            $table->double('amountDue')->nullable();
            $table->string('User_username');
            $table->unsignedBigInteger('Item_itemID');
            $table->unsignedBigInteger('Customers_customerID');
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('User_username')->references('username')->on('users');
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
