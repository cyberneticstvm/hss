<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusUpdate extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'comments',
        'status_id',
        'created_by',
    ];
}
