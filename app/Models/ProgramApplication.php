<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramApplication extends Model
{
    use HasFactory;
    protected $connection = 'admissionportal';
    protected $table = 'students_program_application';
}
