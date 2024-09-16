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
        Schema::create('finance_form', function (Blueprint $table) {
            $table->id();
            $table->string('program');
            $table->string('session');
            $table->string('class');
            $table->date('issue');
            $table->date('due');
            $table->string('feeAcademicYear');
            $table->string('annualCharges');
            $table->string('withholdingTax');
            $table->string('preEnrolmentFee')->nullable();
            $table->string('incExamFee')->nullable();
            $table->string('hostelFee')->nullable();
            $table->string('universityfee')->nullable();
            $table->string('library')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('finance_form');
    }
};
