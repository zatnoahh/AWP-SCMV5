@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subject - Create</title>
</head>
<body>
    <div class="container">
        <h1>Subject - Create</h1>
        <form method="POST" action="{{ route('subjects.store') }}">
            @csrf
            <div class="form-group">
                <label>Subject Code</label>
                <input type="text" class="form-control" placeholder="Enter subject code" name="code" required>
            </div>
            <div class="form-group">
                <label>Subject Name</label>
                <input type="text" class="form-control" placeholder="Enter subject name" name="name" required>
            </div>
            <div class="form-group">
                <label>Credit Hours</label>
                <input type="number" class="form-control" placeholder="Enter credit hours" name="creditHours" required>
            </div>
            <div class="form-group">
                <label>Select Lecturer</label>
                <select class="form-control" name="lecturer_id" required>
                    <option value="" disabled selected>Select a lecturer</option>
                    @foreach($lecturers as $lecturer)
                        <option value="{{ $lecturer->id }}">{{ $lecturer->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</body>
</html>
@endsection