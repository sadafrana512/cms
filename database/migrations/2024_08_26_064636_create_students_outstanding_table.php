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
        Schema::create('students_outstanding', function (Blueprint $table) {
            $table->id();
            $table->integer('SID');
            $table->string('Course', 255);
            $table->string('Class_Name_2024_25', 255);
            $table->string('Course_Pattern', 255);
            $table->string('Student_ID', 255);
            $table->string('Status', 255);
            $table->string('Gender', 50);
            $table->string('Student_Name', 255);
            $table->string('Fee_Arrears', 255)->nullable();
            $table->string('Admission_Fee', 255)->nullable();
            $table->string('Registration_Fee', 255)->nullable();
            $table->string('Tuition_Fee_2024_2025', 255)->nullable();
            $table->string('Annual_Events_Admin_Charges', 255)->nullable();
            $table->string('Sports_Library_Activity', 255)->nullable();
            $table->string('Clinical_Health_Screening_Fee', 255)->nullable();
            $table->string('University_Affiliation_Fee', 255)->nullable();
            $table->string('Security_Fee', 255)->nullable();
            $table->string('Exam_Fee', 255)->nullable();
            $table->string('Conv_Fee', 255)->nullable();
            $table->string('Tax_5_percent', 255)->nullable();
            $table->string('Total_Fee_2024_25', 255)->nullable();
            $table->string('Fee_Fine_After_15_10_2024', 255)->nullable();
            $table->string('Discount_Financial_Aid_CM', 255)->nullable();
            $table->string('Discount_Financial_Aid_MD', 255)->nullable();
            $table->string('Sibling_Discount', 255)->nullable();
            $table->string('Academic_NEST_ANTH_Scholarship', 255)->nullable();
            $table->string('PESSI_Discount', 255)->nullable();
            $table->string('PMC_Discount', 255)->nullable();
            $table->string('Detained_Students_Fee_Adjustments', 255)->nullable();
            $table->string('Foreign_Fee_Adjustments', 255)->nullable();
            $table->string('Admission_Cancellation_Tax_Adjustment', 255)->nullable();
            $table->text('Net_Total_Current_Fee_2024_2025')->nullable();
            $table->text('Current_Fee_Received_2024_2025')->nullable();
            $table->text('Total_Current_Fee_Receivable_2024_2025')->nullable();
            $table->text('Total_Fee_Receivable_2024_2025')->nullable();
            $table->text('Hostel_Arrears')->nullable();
            $table->text('Current_Hostel_Dues')->nullable();
            $table->text('Tax_5_percent_Hostel')->nullable();
            $table->text('Total_Current_Hostel_Dues')->nullable();
            $table->text('Hostel_Adjustments')->nullable();
            $table->text('Total_Current_Hostel_Dues_2024_2025')->nullable();
            $table->text('Hostel_Current_Fee_Received_2024_2025')->nullable();
            $table->text('Total_Current_Hostels_Receivable_2024_25')->nullable();
            $table->text('Total_Hostel_Fee_Receivable_2024_2025')->nullable();
            $table->text('Instruments_In_Hand')->nullable();
            $table->text('Instruments_In_Hand_Hostel_Fee')->nullable();
            $table->text('Total_Receivable_30_06_2025')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students_outstanding');
    }
};
