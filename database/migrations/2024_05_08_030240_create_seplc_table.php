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
        Schema::create('seplc', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seplc_id')->constrained('semi')->onDelete('cascade');
            $table->string('uacs_obj_code');
            $table->string('date');
            $table->string('reference');
            $table->string('particulars');
            $table->string('receipt_qty');
            $table->string('receipt_unitcost');
            $table->string('receipt_totalcost');
            $table->float('it_adjustment');
            $table->float('accu_impairment_losses');
            $table->float('adj_cost');
            $table->float('nature_of_repair');
            $table->float('repair_amount');
            $table->float('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seplc');
    }
};
