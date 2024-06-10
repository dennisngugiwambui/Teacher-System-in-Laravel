<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'phone_number',
        'address',
        'date_of_birth',
        'gender',
        'employee_id',
        'job_title',
        'subjects_taught',
        'department',
        'employment_status',
        'hire_date',
        'salary',
        'degrees',
        'institutions',
        'major',
        'years_experience',
        'previous_schools',
        'training_courses',
        'certifications',
        'emergency_contact_name',
        'emergency_contact_relationship',
        'emergency_contact_phone',
        'unique_id',
    ];
}
