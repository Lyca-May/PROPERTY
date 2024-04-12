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
        Schema::create('propery_card_ext', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prop_id')->constrained('property_card')->onDelete('cascade');
            $table->date('date');
            $table->string('reference');
            $table->string('receipt_qty');
            $table->string('receipt_unitcost');
            $table->decimal('receipt_totalcost');
            $table->string('issue_qty');
            $table->string('office_officer');
            $table->string('issue_transfer_disposal');
            $table->string('bal_qty');
            $table->decimal('bal_amount');
            $table->string('remarks');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propery_card_ext');
    }
};
