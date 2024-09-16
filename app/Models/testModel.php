<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class testModel extends Model
{
    use HasFactory;
    protected $connection = 'attendance_module'; // specify the connection if using multiple connections
    protected $table = 'personal_info'; // specify the table name if different from the model name

    protected $fillable = [
        'profile_id', 'unique_id', 'first_name', 'middle_name', 'last_name', 'cnic', 'birth_date', 
        'gender', 'marital_status', 'blood_group', 'phone_no', 'student_image', 'student_cnic_image', 
        'father_name', 'father_phone_no', 'father_email', 'father_national_id', 'father_cnic', 
        'mother_national_id', 'mother_name', 'mother_phone_no', 'mother_email', 'mother_cnic', 
        'guardian_title', 'guardian_national_id', 'guardian_phone_no', 'guardian_email', 'guardian_name', 
        'matric_passing_year', 'matric_board', 'matric_marks_obtained', 'matric_total_marks', 
        'matric_institution', 'fsc_passing_year', 'fsc_board', 'fsc_marks_obtained', 'fsc_total_marks', 
        'fsc_institution', 'registration_no', 'entry_test_type', 'mdcat_obtained_marks', 'mdcat_total_marks', 
        'mailing_address_line_1', 'city', 'pemail', 'program', 'category', 'oemail', 'lms_id', 
        'admission_year', 'pmdc_reg_no', 'university_reg_no', 'domicile', 'transport', 'hostel'
    ];

}
