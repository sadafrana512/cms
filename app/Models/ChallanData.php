<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChallanData extends Model
{
    use HasFactory;
    protected $table = 'challan_data';

    protected $fillable = [
        'name',
        'program',
        'session',
        'class',
        'email',
        'issue',
        'due',
        'feeAcademicYear',
        'annualCharges',
        'withholdingTax',
        'hostelFee',
        'universityFee',
        'library',
        'preEnrolmentFee',
        'incExamFee',
        'balance',
        'scholarship',
        'nest',
        'anth',
        'sdiscount',
        'pmcdiscount',
        'chairmandiscount',
        'ceodiscount',
        'feeAdjustment',
        'arrears',
        'totalWithinDueDate',
        'lateFeeFine',
        'totalAfterDueDate',
        'paid',
    ];
}
