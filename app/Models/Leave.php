<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'leave_type',
        'start_date',
        'end_date',
        'reason',
    ];

    // Define the relationship with the Teacher model
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
