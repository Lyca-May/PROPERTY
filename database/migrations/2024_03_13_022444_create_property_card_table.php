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
        Schema::create('property_card', function (Blueprint $table) {
            // PC
            $table->id();
            $table->string('entity_name')->nullable();
            $table->string('fund_cluster')->nullable();
            $table->string('prop_plant_eq')->nullable();
            $table->string('description')->nullable();
            $table->string('prop_no')->nullable();
            $table->date('date')->nullable();
            $table->string('reference')->nullable();
            $table->integer('receipt_qty')->nullable();
            $table->integer('issue_qty')->nullable();
            $table->string('issue_office_officer')->nullable();
            $table->integer('bal_qty')->nullable();
            $table->float('repair_amount')->nullable();
            $table->string('remarks')->nullable();

            // PPELC
            $table->string('obj_acc_code')->nullable();
            $table->string('est_useful_life')->nullable();
            $table->string('rate_of_dep')->nullable();
            $table->float('receipt_unitcost')->nullable();
            $table->decimal('receipt_totalcost')->nullable();
            $table->string('accumulated_dep')->nullable();
            $table->string('accumulated_impairment_losses')->nullable();
            $table->string('issue_transfers_adjustments')->nullable();
            $table->string('adjusted_code')->nullable();
            $table->string('repair_nature')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_card');
    }
};
