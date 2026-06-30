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

    public function trashed(Request $request)
    {
        $search = $request->search;

        $students = Student::onlyTrashed()
            ->when($search, function ($query, $search) {
                $query->where('student_number', 'like', "%{$search}%")
                      ->orWhere('first_name', 'like', "%{$search}%")
                      ->orWhere('last_name', 'like', "%{$search}%");
            })
            ->latest('deleted_at')
            ->paginate(10);

        return view('students.trashed', compact('students', 'search'));
    }

    public function restore(int $id) // <-- Added 'int' here
    {
        // Find the deleted record using onlyTrashed()
        $student = Student::onlyTrashed()->findOrFail($id);

        // Restore the record
        $student->restore();

        // Redirect back to the trash page with a success message
        return redirect()
            ->route('students.trashed')
            ->with('success', 'Student restored successfully.');
    }

    /**
     * Permanently delete a student from the database.
     */
    public function forceDelete(int $id) // <-- Added 'int' here
    {
        // Find the student in the trash
        $student = Student::withTrashed()->findOrFail($id);
        
        // Permanently erase them
        $student->forceDelete();

        return redirect()
            ->route('students.trashed')
            ->with('success', 'Student permanently deleted.');
    }
}