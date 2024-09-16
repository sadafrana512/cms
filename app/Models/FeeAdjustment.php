<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeAdjustment extends Model
{
    use HasFactory;
    protected $fillable = [
        'studentId',
        'studentName',
        'program',
        'session',
        'class',
        'balance',
        'scholarship',
        'nest',
        'anth',

        'sdiscount',
        'pmcdiscount',
        'chairmandiscount',
        'ceodiscount',
        'feeAdjustment',
    ];
}
