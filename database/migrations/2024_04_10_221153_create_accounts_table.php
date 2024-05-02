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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id('accountID');
            $table->string('accountName')->unique();
            $table->string('accountDetails')->nullable();
            $table->unsignedBigInteger('Customers_customerID');
            $table->enum('payMethod', ['Cash', 'Card', 'Cheque']);
            $table->timestamps();

            $table->foreign('Customers_customerID')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
