<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->can('viewAny', Subject::class)) {
            $students = Student::all();
            return view('students.index', compact('students'));
        } else {
            return view('errors.403');
        }
       
        /*
        if (Gate::allows('isAdmin')) {
            $students = Student::all();
            return view('students.index', compact('students'));
        } else {
            return view('errors.403');
        }
        */
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $subjects = Subject::all();
        return view('students.create', compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'studentNo' => 'required|string|unique:students',
            'email' => 'required|email|unique:students',
        ]);

        Student::create($validated);

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        // Eager load subjects for the student
        $student->load('subjects'); // Eager-load subjects
        $subjects = Subject::all(); // Fetch all subjects to populate the dropdown
        return view('students.show', compact('student', 'subjects'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $subjects = \App\Models\Subject::all();
        return view('students.edit', compact('student', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate(['name'=>'required',
        'studentNo'=>'required',
        'email'=>'required']);
        $student->update($request->all());
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with("Student deleted successfully");
    }

    public function addSubject(Request $request, Student $student)
    {
        $validated = $request->validate([
            'subject_id' => 'required |exists:subjects,id',
            'semester' => 'required|string|max:255',
            'timetable' => 'nullable|json',
        ]);

        $student->subjects()->attach($validated['subject_id'], [
            'semester' => $validated['semester'],
            'timetable' => $validated['timetable'] ?? json_encode([]),  
        ]);

        return redirect()->route('students.show', $student)->with('success', 'Subject added successfully');
    }

    public function removeSubject(Student $student, Subject $subject)
    {
        $student->subjects()->detach($subject);
        
        return redirect()->route('students.show', $student)->with('success', 'Subject removed successfully');
    }
}