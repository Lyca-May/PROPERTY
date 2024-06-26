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
        Schema::create('semi_extension', function (Blueprint $table) {
            $table->id();
            $table->foreignId('semi_id')->constrained('semi')->onDelete('cascade');
            $table->string('date');
            $table->string('reference');
            $table->string('issue_qty');
            $table->string('receipt_qty');
            $table->string('receipt_unitcost');
            $table->string('receipt_totalcost');
            $table->string('transfer_from');
            $table->string('office_officer');
            $table->string('issue_transfer_disposal');
            $table->string('item_no');
            $table->string('bal_qty');
            $table->float('bal_amount');
            $table->string('remarks');
            $table->string('uacs_obj_code');
            $table->string('acctg_reference');
            $table->string('particulars');
            $table->float('it_adjustment');
            $table->float('accu_impairment_losses');
            $table->float('adj_cost');
            $table->float('nature_of_repair');
            $table->float('repair_amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('semi_extension');
    }
};
