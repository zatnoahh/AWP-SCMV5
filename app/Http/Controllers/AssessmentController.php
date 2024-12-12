<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Assessment;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Gate::allows('isAdmin') || Gate::allows('isLecturer')){
        $assessments = Assessment::all();
        $assessments = Assessment::with('subject')->get();
        return view('assessments.index', compact('assessments'));
        } else {
            return view('errors.403');
        }
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subjects = Subject::all();
        return view('assessments.create', compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['name','type','percentage','subject_id','remarks']);
        Assessment::create($request->all());
        return redirect()->route('assessments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Assessment $assessment)
    {
        return view('assessments.show', compact('assessment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Assessment $assessment)
    {
        $subjects = Subject::all();
        return view('assessments.edit', compact('assessment', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Assessment $assessment)
    {
        $request->validate(['name','type','percentage','subject_id','remarks']);
        $assessment->update($request->all());
        return redirect()->route('assessments.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Assessment $assessment)
    {
        $assessment->delete();
        return redirect()->route('assessments.index');
    }
}
