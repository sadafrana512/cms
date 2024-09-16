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
        Schema::create('personal_info', function (Blueprint $table) {
            $table->id();
            $table->string('profile_id')->nullable();
            $table->string('unique_id')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('cnic', 13)->unique();
            $table->date('birth_date')->nullable();
            $table->string('gender')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('mailing_address_line_1')->nullable();
            $table->string('nationality')->nullable();
            $table->string('pemail')->nullable();
            $table->string('program')->nullable();
            $table->string('city')->nullable();
            $table->string('category')->nullable();
            $table->string('oemail')->nullable();
            $table->string('lms_id')->nullable();
            $table->string('admission_year')->nullable();
            $table->string('pmdc_reg_no')->nullable();
            $table->string('university_reg_no')->nullable();
            $table->string('domicile')->nullable();
            $table->string('transport')->nullable();
            $table->string('hostel')->nullable();
            $table->string('student_image')->nullable();
            $table->string('student_cnic_image')->nullable();

            //father
            // $table->string('father_title');
            // $table->string('father_passport_no');
            // $table->string('mother_national_id')->nullable();
            $table->string('father_name');
            $table->string('father_phone_no');
            $table->string('father_email');
            $table->string('father_national_id');
            $table->string('father_cnic');
            //mother
            $table->string('mother_national_id');
            $table->string('mother_name');
            $table->string('mother_phone_no');
            $table->string('mother_email');
            $table->string('mother_cnic');
           // guardian
            $table->string('guardian_title');
            $table->string('guardian_national_id');
            $table->string('guardian_phone_no');
            $table->string('guardian_email');
            $table->string('guardian_name');
        //    academicinfossc
            $table->string('matric_passing_year');
            $table->string('matric_board');
            $table->string('matric_marks_obtained');
            $table->string('matric_total_marks');
            $table->string('matric_institution');
            // academicinfohssc
            $table->string('fsc_passing_year');
            $table->string('fsc_board');
            $table->string('fsc_marks_obtained');
            $table->string('fsc_total_marks');
            $table->string('fsc_institution');
             // testinfo
             $table->string('registration_no');
             $table->string('entry_test_type');
             $table->string('mdcat_obtained_marks');
             $table->string('mdcat_total_marks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_info');
    }
};
