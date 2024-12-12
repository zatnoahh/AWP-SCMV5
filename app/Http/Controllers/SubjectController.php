<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\Lecturer;
use App\Models\Subject;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        $user = Auth::user();
        if ($user->can('viewAny', Subject::class)) {
            $subjects = Subject::all();
            return view('subjects.index', compact('subjects'));
        } else {
            return view('errors.403');
        }

        /*if(Gate::allows('isAdmin' ) || Gate::allows('isStudent') || Gate::allows('isLecturer')){
        $subjects = Subject::all();
        return view('subjects.index', compact('subjects'));
        } else {
            return view('errors.404');
        }
        */
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        if($user->can('create', Subject::class)){
            $lecturers = Lecturer::all(); // Retrieve all lecturers
            return view('subjects.create', compact('lecturers')); // Pass to view
        } else {
            return view('errors.403');
        }
        /*
        $lecturers = Lecturer::all(); // Retrieve all lecturers
        return view('subjects.create', compact('lecturers')); // Pass to view
        */
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate(['code','name','creditHours','lecturer_id']);
        Subject::create($request->all());
        return redirect()->route('subjects.index')->with('success', 'Subject created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        
        return view('subjects.show', compact('subject'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        $this->authorize('update', $subject);
        return view('subjects.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        $request->validate(['code','name','creditHours']);
        $subject->update($request->all());
        return redirect()->route('subjects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->route('subjects.index')->with('Subject deleted successfully');
    }

    public function removeAssessment(Subject $subject, Assessment $assessment)
    {
        $assessment->delete(); // Delete the assessment
        return redirect()->route('subjects.show', $subject)->with('success', 'Assessment removed successfully.');
    }

}