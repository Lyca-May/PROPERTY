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
        Schema::create('supplies_card', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sc_id'); // Assuming this is the foreign key column
            $table->foreign('sc_id')->references('id')->on('sc_andslc')->onDelete('cascade'); // Adjust this according to your actual table name
            $table->unsignedInteger('bal_qty'); // Assuming this is the quantity field
            $table->decimal('bal_unitcost', 8, 2); // Assuming this is the unit cost field
            $table->decimal('bal_totalcost', 10, 2); // Assuming this is the total cost field
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplies_card');
    }
};
