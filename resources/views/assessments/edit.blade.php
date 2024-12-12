@extends('layouts.app')
@section('content')
<div class="container">
        <h1>Assessment - Edit</h1>
        <form method="POST" action="{{ route('assessments.update', $assessment->id) }}">
            @method('PUT')
            <!--Prevention for phishing-->
            @csrf 
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{ $assessment->name }}">
            </div>
            <div class="form-group">
                <label>Assessment Type</label>
                <input type="text" class="form-control" placeholder="Enter assessment type" name="type" value="{{ $assessment->type }}">
            </div>
            <div class="form-group">
                <label>Percentage (%)</label>
                <input type="text" class="form-control" placeholder="Enter percentage" name="percentage" value="{{ $assessment->percentage }}">
            </div>
            <div class="form-group">
                <label>Course</label>
                <select class="form-control" name="subject_id">
                    <option value="">Select Course</option>
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}" {{ $subject->id == $assessment->subject_id ? 'selected' : '' }}>{{ $subject->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Remarks</label>
                <input type="text" class="form-control" placeholder="Enter new remarks" name="remarks" value="{{ $assessment->remarks }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <a href="{{ route('assessments.index') }}" class="btn btn-secondary mt-3">Back to Assessments</a>
    </div>
@endsection