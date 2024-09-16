<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormModel extends Model
{
    use HasFactory;

    protected $connection = 'admissionportal';
    protected $table = 'students_personal_information';

    public function user()
    {
        return $this->belongsTo(User::class, 'tracking_id', 'tracking_id');
    }

    public function academicInformation()
    {
        return $this->hasOne(AcademicInformation::class, 'tracking_id', 'tracking_id');
    }

    public function testInformation()
    {
        return $this->hasOne(StudentsTestInformation::class, 'tracking_id', 'tracking_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'mailing_city', 'id');
    }
    public function programApplications()
    {
        return $this->hasMany(ProgramApplication::class, 'student_tracking_id', 'tracking_id');
    }
}
