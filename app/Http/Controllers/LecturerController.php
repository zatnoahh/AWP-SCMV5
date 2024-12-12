<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Lecturer;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Gate::allows('isAdmin', auth()->user())){
        $lecturers = Lecturer::all();
        return view('lecturers.index', compact('lecturers'));
        } else {
            return view('errors.403');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lecturers = Lecturer::all();
        return view('lecturers.create', compact('lecturers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['name','staffNo','email']);
        Lecturer::create($request->all());
        return redirect()->route('lecturers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lecturer $lecturer)
    {
        return view('lecturers.show', compact('lecturer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lecturer $lecturer)
    {
        return view('lecturers.edit', compact('lecturer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lecturer $lecturer)
    {
        $request->validate(['name','staffNo','email']);
        $lecturer->update($request->all());
        return redirect()->route('lecturers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lecturer $lecturer)
    {
        $lecturer->delete();
        return redirect()->route('lecturers.index')->with("Lecturer deleted successfully");
    }

    public function addSubject(Request $request, Lecturer $lecturer)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50',
            'creditHours' => 'required|integer|min:1',
        ]);

        // Create the subject and associate with the lecturer
        $subject = Subject::create([
            'name' => $request->name,
            'code' => $request->code,
            'creditHours' => $request->creditHours,
            'lecturer_id' => $lecturer->id,
        ]);

        return redirect()->back()->with('success', 'Subject added successfully!');
    }

    public function removeSubject(Request $request, Lecturer $lecturer, Subject $subject)
{
    // Detach the subject from the lecturer
    $lecturer->subjects()->detach($subject->id);

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Subject removed successfully!');
}


}
