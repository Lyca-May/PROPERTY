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
        Schema::create('property_card_extenstions', function (Blueprint $table) {
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
            $table->string('transfer_dropdown');
            $table->string('obj_acc_code')->nullable();
            $table->string('est_useful_life')->nullable();
            $table->string('rate_of_dep')->nullable();
            $table->string('acctg_reference')->nullable();
            $table->string('particulars')->nullable();
            $table->string('accu_dep')->nullable();
            $table->string('accu_impairment_losses')->nullable();
            $table->string('it_adjustments')->nullable();
            $table->string('adj_cost')->nullable();
            $table->string('repair_nature')->nullable();
            $table->string('repair_amount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_card_extenstions');
    }
};
