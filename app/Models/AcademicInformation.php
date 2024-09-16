<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicInformation extends Model
{
    use HasFactory;
    protected $connection = 'admissionportal';
    protected $table = 'students_academic_information'; 

    
}