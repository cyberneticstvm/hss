<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type_id',
        'domain_area',
        'registered_address',
        'contact_address',
        'contact_person',
        'contact_number',
        'email',
        'date_of_incorp',
        'years_of_experience',
        'number_of_employees',
        'year1',
        'fee1',
        'year2',
        'fee2',
        'year3',
        'fee3',
        'blacklisted_details',
        'litigations_details',
        'not_eligible_details',
        'other_details',
        'folder',
        'attachment_1',
        'attachment_2',
        'attachment_3',
        'attachment_4',
        'attachment_5',
        'attachment_6',
        'attachment_7',
        'attachment_8',
        'attachment_9',
        'attachment_10',
        'user_id',
        'status',
    ];
}
