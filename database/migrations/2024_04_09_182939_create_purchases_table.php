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
            $table->id('purchaseID');
            $table->string('purchaseDate');
            $table->integer('purchaseQuantity');
            $table->double('amountDue');
            $table->string('User_username'); // Foreign key to users table
            $table->unsignedBigInteger('Item_itemID'); // Foreign key to items table
            $table->unsignedBigInteger('Customers_customerID'); // Foreign key to customers table
            $table->double('payAmount');
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('User_username')->references('username')->on('users');
            $table->foreign('Item_itemID')->references('itemID')->on('items');
            $table->foreign('Customers_customerID')->references('id')->on('customers'); // Fixing the foreign key column name
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
