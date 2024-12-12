@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecturer - Show</title>
</head>
<body>
<div class="container">
        <h1>Lecturer Details</h1>

        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $lecturer->name }}</h5>
                <p><strong>Student ID:</strong> {{ $lecturer->staffNo }}</p>
                <p><strong>Email:</strong> {{ $lecturer->email }}</p>
            </div>
        </div>

        <h2>Subjects Tought</h2>
        @if ($lecturer->subjects->isEmpty())
            <p>This student has not taken any subjects yet.</p>
        @else
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Subject Code</th>
                    <th>Subject Name</th>
                    <th>Credit Hours</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($lecturer->subjects as $subject)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $subject->code }}</td>
                        <td>{{ $subject->name }}</td>
                        <td>{{ $subject->creditHours }}</td>
                        <td>
                            <form action="{{ route('lecturers.removeSubject', [$lecturer, $subject]) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove this subject?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif

        <h3>Add Subject Taught by Lecturer</h3>
        <form action="{{ route('lecturers.addSubject', $lecturer) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="code" class="form-label">Subject Code</label>
                <input type="text" id="code" name="code" class="form-control" placeholder="Enter Subject Code" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Subject Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Enter Subject Name" required>
            </div>
            <div class="mb-3">
                <label for="creditHours" class="form-label">Credit Hours</label>
                <input type="number" id="creditHours" name="creditHours" class="form-control" placeholder="Enter Credit Hours" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Subject</button>
        </form>


        <a href="{{ route('lecturers.index') }}" class="btn btn-secondary mt-3">Back to Lecturer</a>
    </div>
</body>

</html>
@endsection