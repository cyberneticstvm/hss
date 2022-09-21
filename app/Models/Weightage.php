<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weightage extends Model
{
    use HasFactory;

    protected $fillable = [
        'cr1_limit',
        'cr1_score',
        'cr2_limit',
        'cr2_score',
        'cr3_limit',
        'cr3_score',
        'cr4_limit',
        'cr4_score',
        'cr9_weightage',
        'cr9_score',
        'cr10_weightage',
        'cr10_score',
        'cr11_weightage',
        'cr11_score',
        'cr12_weightage',
        'cr12_score',
        'cr13_weightage',
        'cr13_score',
        'cr14_weightage',
        'cr14_score',
    ];
}
