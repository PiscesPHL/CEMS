<?php

namespace App\Mail;

use App\Models\Student;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StudentWelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Student $student) 
    {
        //
    }

    public function build()
    {
        return $this->subject('Welcome to the Student Record System')
                    ->view('emails.students.welcome');
    }
}