<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // <-- 1. Import this

class Student extends Model
{
    use HasFactory, SoftDeletes; // <-- 2. Add it here next to HasFactory

    protected $fillable = [
        'student_number',
        'first_name',
        'last_name',
        'course',
        'year_level'
    ];
}