<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Adding the fillable array from your bootcamp slide
    protected $fillable = [
        'student_number',
        'first_name',
        'last_name',
        'course',
        'year_level'
    ];
}