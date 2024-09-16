<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentsTestInformation extends Model
{
    use HasFactory;
    protected $connection = 'admissionportal';
    protected $table = 'students_test_information';
}
