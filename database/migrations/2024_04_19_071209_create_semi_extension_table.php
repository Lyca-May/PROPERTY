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
            $table->string('issue_qty');
            $table->string('transfer_from');
            $table->string('office_officer');
            $table->string('issue_transfer_disposal');
            $table->string('bal_qty');
            $table->float('bal_amount');
            $table->string('remarks');
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
