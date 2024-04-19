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
        Schema::create('sc_andslc', function (Blueprint $table) {
            $table->id();
            $table->string('entity_name');
            $table->string('fund_cluster');
            $table->string('item_name');
            $table->string('description');
            $table->string('unit_of_measurement');
            $table->string('item_code');
            $table->decimal('reorder_point');
            $table->integer('stock_no');

            $table->date('date');
            $table->string('reference');
            $table->integer('receipt_qty');
            $table->float('receipt_unitcost');
            $table->decimal('receipt_totalcost');
            $table->integer('issue_qty');
            $table->float('issue_unitcost');
            $table->decimal('issue_totalcost');
            $table->integer('bal_qty');
            $table->float('bal_unitcost');
            $table->decimal('bal_totalcost');
            $table->integer('no_of_days');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sc_andslc');
    }
};
