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
        Schema::create('semi_expandable', function (Blueprint $table) {
            $table->id();
            $table->string('entity_name');
            $table->string('fund_cluster');
            $table->string('investment_prop');
            $table->string('description');
            $table->string('UACS_object_code');
            $table->string('estimated_useful_life');
            $table->decimal('rate_of_depreciation');
            $table->integer('stock_no');
            $table->date('date');
            $table->string('reference');
            $table->integer('receipt_qty');
            $table->float('receipt_unitcost');
            $table->decimal('receipt_totalcost');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('semi_expandable');
    }
};
