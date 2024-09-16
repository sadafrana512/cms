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
        Schema::create('fee_adjustments', function (Blueprint $table) {
            $table->id();
            $table->string('studentId');
            $table->string('studentName');
            $table->string('program');
            $table->string('session');
            $table->string('class')->nullable();
            $table->decimal('balance', 10, 2)->nullable();
            $table->decimal('nest', 10, 2)->nullable();
            $table->decimal('anth', 10, 2)->nullable();
            $table->decimal('scholarship', 10, 2)->nullable();
            $table->decimal('sdiscount', 10, 2)->nullable();
            $table->decimal('pmcdiscount', 10, 2)->nullable();
            $table->decimal('chairmandiscount', 10, 2)->nullable();
            $table->decimal('ceodiscount', 10, 2)->nullable();
            $table->decimal('feeAdjustment', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fee_adjustments');
    }
};
