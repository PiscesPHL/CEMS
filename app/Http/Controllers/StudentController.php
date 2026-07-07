<?php

namespace App\Http\Controllers;

use App\Jobs\SendStudentWelcomeEmail;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    /**
     * Display a listing of the students.
     */
    public function index()
    {
        $students = Student::all(); 
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
        $validated = $request->validate([
            'student_number' => 'required|unique:students',
            'email' => 'required|email|unique:students',
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'course' => 'required',
            'year_level' => 'required',
        ]);

        $student = Student::create($validated);
        SendStudentWelcomeEmail::dispatch($student);

        return redirect('/students')->with('success', 'Student saved. Email queued.');
    }

    /**
     * Show the form for editing the specified student.
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified student in the database.
     */
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'student_number' => [
                'required', 
                Rule::unique('students')->ignore($student->id)
            ],
            'email' => [
                'required', 
                'email', 
                Rule::unique('students')->ignore($student->id)
            ],
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'course' => 'required',
            'year_level' => 'required',
        ]);

        $student->update($validated);

        return redirect()->route('students.index')
            ->with('success', 'Student updated.');
    }

    /**
     * Remove the specified student from the database.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect('students')->with('success', 'Student deleted successfully.');
    }

    /**
     * Display a list of soft-deleted students.
     */
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

    /**
     * Restore a soft-deleted student.
     */
    public function restore(int $id)
    {
        $student = Student::onlyTrashed()->findOrFail($id);
        $student->restore();

        return redirect()
            ->route('students.trashed')
            ->with('success', 'Student restored successfully.');
    }

    /**
     * Permanently delete a student from the database.
     */
    public function forceDelete(int $id)
    {
        $student = Student::withTrashed()->findOrFail($id);
        $student->forceDelete();

        return redirect()
            ->route('students.trashed')
            ->with('success', 'Student permanently deleted.');
    }
}