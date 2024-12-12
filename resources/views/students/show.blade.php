@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student - Show</title>
</head>
<body>
    <style>
        .table-container {
            width: 100%;
        }
        .table {
            width: 100%;
            table-layout: fixed; /* Ensures consistent column widths */
        }
        .table th, .table td {
            text-align: left;
            padding: 8px;
        }
        .table th {
            background-color: #f2f2f2;
        }
        .table th, .table td {
            width: 25%; /* Adjust this if you have more or fewer columns */
        }
    </style>
<div class="container">
        <h1>Student Details</h1>

        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $student->name }}</h5>
                <p><strong>Student ID:</strong> {{ $student->studentNo }}</p>
                <p><strong>Email:</strong> {{ $student->email }}</p>
            </div>
        </div>

        <h2>Subjects Taken</h2>
        @if ($student->subjects->isEmpty())
            <p>This student has not taken any subjects yet.</p>
        @else
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Subject Name</th>
                    <th>Subject Code</th>
                    <th>Credit Hours</th>
                    <th>Semester</th>
                    <th>Timetable</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($student->subjects as $subject)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $subject->name }}</td>
                        <td>{{ $subject->code }}</td>
                        <td>{{ $subject->creditHours }}</td>
                        <td>{{ $subject->pivot->semester }}</td>
                        <td>
                            @if ($subject->pivot->timetable)
                                @php
                                    $timetable = json_decode($subject->pivot->timetable, true);
                                @endphp
                                <ul class="list-unstyled">
                                    @foreach ($timetable as $day => $time)
                                        <li><strong>{{ ucfirst($day) }}:</strong> {{ $time }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <em>No timetable set</em>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('students.removeSubject', [$student, $subject]) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove this subject?');">
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

        <h2>Assessment for Each Subject</h2>
        @if ($student->subjects->isEmpty())
            <p>This student has not taken any subjects yet.</p>
        @else
            @foreach ($student->subjects as $subject)
                <h4><strong>{{ $subject->name }} ({{ $subject->code }})</strong></h4>
                @if ($subject->assessments->isEmpty())
                    <p>No assessments available for this subject.</p>
                @else
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Assessment Name</th>
                            <th>Percentage</th>
                            <th>Remarks</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($subject->assessments as $assessment)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $assessment->name }}</td>
                                <td>{{ $assessment->percentage }}%</td>
                                <td>{{ $assessment->remarks }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            @endforeach
        @endif


        <h3>Add Subject to Student</h3>
        <form action="{{ route('students.addSubject', $student) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="subject_id" class="form-label">Select Subject</label>
                <select id="subject_id" name="subject_id" class="form-control" required>
                    <option value="">-- Choose Subject --</option>
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->name }} ({{ $subject->code }})</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="semester" class="form-label">Semester</label>
                <input type="text" id="semester" name="semester" class="form-control" placeholder="e.g., Sem 1 2024/25" required>
            </div>
            <div class="mb-3">
                <label for="timetable" class="form-label">Timetable (JSON)</label>
                <textarea id="timetable" name="timetable" class="form-control" placeholder='e.g., {"Monday": "9-11AM", "Wednesday": "2-4PM"}'></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Subject</button>
        </form>

        <a href="{{ route('students.index') }}" class="btn btn-secondary mt-3">Back to Students</a>
    </div>
</body>
</html>
@endsection