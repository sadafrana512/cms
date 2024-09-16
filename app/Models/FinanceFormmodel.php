<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinanceFormmodel extends Model
{
    use HasFactory;
    protected $fillable = [
        'program',
        'session',
        'class',
        'issue',
        'due',
        'feeAcademicYear',
        'annualCharges',
        'withholdingTax',
        'preEnrolmentFee',
        'incExamFee',
        'hostelFee',
        'universityAffiliationFee',
        'libraryFund',
    ];
    protected $table = 'finance_form'; 

}
