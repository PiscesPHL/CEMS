<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the students.
     */
    public function index()
    {
        // Fetch all students from the database
        $students = Student::all(); 
        
        // Pass the students to your index.blade.php view
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new student.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created student in the database.
     */
    public function store(Request $request)
    {
        // 1. Validate the form data
        $request->validate([
            'student_number' => 'required|string|max:255|unique:students,student_number',
            'first_name'     => 'required|string|max:255',
            'last_name'      => 'required|string|max:255',
            'course'         => 'required|string|max:255',
            'year_level'     => 'required|string|max:255',
        ]);

        // 2. Save to database
        Student::create($request->all());

        // 3. Redirect back to the table with a success message
        return redirect('students')->with('success', 'Student added successfully.');
    }

    /**
     * Show the form for editing the specified student.
     */
    public function edit(Student $student)
    {
        // The $student is automatically fetched by Laravel based on the URL ID
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified student in the database.
     */
    public function update(Request $request, Student $student)
    {
        // 1. Validate the form data (ignoring the current student's number for the unique check)
        $request->validate([
            'student_number' => 'required|string|max:255|unique:students,student_number,' . $student->id,
            'first_name'     => 'required|string|max:255',
            'last_name'      => 'required|string|max:255',
            'course'         => 'required|string|max:255',
            'year_level'     => 'required|string|max:255',
        ]);

        // 2. Update the database record
        $student->update($request->all());

        // 3. Redirect back to the table with a success message
        return redirect('students')->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified student from the database.
     */
    public function destroy(Student $student)
    {
        // Delete the record
        $student->delete();

        // Redirect back to the table with a success message
        return redirect('students')->with('success', 'Student deleted successfully.');
    }
}