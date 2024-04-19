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
        Schema::create('stock_card_extension', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stock_id')->constrained('sc_andslc')->onDelete('cascade');
            $table->date('date');
            $table->string('reference');
            $table->string('issue_qty');
            $table->string('office_officer');
            $table->string('new_bal_qty');
            $table->string('bal_totalcost');
            $table->string('no_of_days');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_card_extension');
    }
};
