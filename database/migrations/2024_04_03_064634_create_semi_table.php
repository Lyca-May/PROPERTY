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
        Schema::create('semi', function (Blueprint $table) {
            $table->id();
            $table->string('entity_name');
            $table->string('desc');
            $table->string('fund_cluster');
            $table->string('sep_no');
            $table->string('sep_name');
            $table->date('date');
            $table->string('ref');
            $table->string('receipt_qty');
            $table->string('receipt_unitcost');
            $table->string('receipt_totalcost');
            $table->string('item_no');
            $table->string('issue_qty');
            $table->string('office_officer');
            $table->string('bal_qty');
            $table->float('amount');
            $table->string('remarks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('semi');
    }
};
