@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assessment - Create</title>
</head>
<body>
    <div class="container">
    <h1>Assessment - Create</h1>
        <form method="POST" action= "{{route('assessments.store')}}">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter name" name="name">
            </div>
            <div class="form-group">
                <label>Assessment Type</label>
                <input type="text" class="form-control" placeholder="Enter assessment type" name="type">
            </div>
            <div class="form-group">
                <label>Percentage (%)</label>
                <input type="fload" class="form-control" placeholder="Enter percentage" name="percentage">
            </div>
            <div class="form-group">
                <label>Course</label>
                <select class="form-control" name="subject_id">
                    <option value="">Select Course</option>
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Remarks</label>
                <input type="text" class="form-control" placeholder="Enter remarks" name="remarks">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</body>
</html>
@endsection