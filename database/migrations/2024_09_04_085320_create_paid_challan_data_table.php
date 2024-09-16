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
        Schema::create('paid_challan_data', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('program');
            $table->string('session');
            $table->string('class');
            $table->string('email');
            $table->date('issue');
            $table->date('due');
            $table->decimal('feeAcademicYear', 10, 2)->default(0.00);
            $table->decimal('annualCharges', 10, 2)->default(0.00);
            $table->decimal('withholdingTax', 10, 2)->default(0.00);
            $table->decimal('hostelFee', 10, 2)->default(0.00);
            $table->decimal('universityFee', 10, 2)->default(0.00);
            $table->decimal('library', 10, 2)->default(0.00);
            $table->decimal('preEnrolmentFee', 10, 2)->default(0.00);
            $table->decimal('incExamFee', 10, 2)->default(0.00);
            $table->decimal('balance', 10, 2)->default(0.00);
            $table->decimal('scholarship', 10, 2)->default(0.00);
            $table->decimal('nest', 10, 2)->default(0.00);
            $table->decimal('anth', 10, 2)->default(0.00);
            $table->decimal('sdiscount', 10, 2)->default(0.00);
            $table->decimal('pmcdiscount', 10, 2)->default(0.00);
            $table->decimal('chairmandiscount', 10, 2)->default(0.00);
            $table->decimal('ceodiscount', 10, 2)->default(0.00);
            $table->decimal('feeAdjustment', 10, 2)->default(0.00);
            $table->decimal('arrears', 10, 2)->default(0.00);
            $table->decimal('totalWithinDueDate', 10, 2)->default(0.00);
            $table->decimal('lateFeeFine', 10, 2)->default(0.00);
            $table->decimal('totalAfterDueDate', 10, 2)->default(0.00);
            
            $table->boolean('paid')->default(false);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paid_challan_data');
    }
};
