<?php

namespace App\Http\Controllers;

use App\Mail\StudentWelcomeMail;
use App\Models\Student;
use Illuminate\Support\Facades\Mail;
// Remove the 'use Illuminate\Http\Request;' line from here!

class StudentEmailController extends Controller
{
    /**
     * Send a welcome email to the specific student.
     */
    public function sendWelcome(Student $student)
    {
        Mail::to($student->email)
            ->send(new StudentWelcomeMail($student));

        return back()->with('success', 'Email sent to ' . $student->email);
    }
}