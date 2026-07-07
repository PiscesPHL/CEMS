<?php

namespace App\Http\Controllers;

use App\Mail\StudentWelcomeMail;
use App\Models\Student;
use Illuminate\Support\Facades\Mail;

class StudentEmailController extends Controller
{
    /**
     * Send the welcome email to the given student.
     */
    public function sendWelcome(Student $student)
    {
        Mail::to($student->email)
            ->send(new StudentWelcomeMail($student));

        return back()->with('success', 'Email sent to ' . $student->email);
    }
}