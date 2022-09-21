<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'qualification_1',
        'qualification_2',
        'qualification_3',
        'qualification_4',
        'experience_1',
        'experience_2',
        'experience_3',
        'experience_4',
        'capex_1',
        'capex_2',
        'capex_3',
        'total',
        'created_by',
    ];
}
