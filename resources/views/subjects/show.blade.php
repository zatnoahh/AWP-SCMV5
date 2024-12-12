@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subject - Show</title>
</head>
<body>
<div class="container">
        <h1>Subject Details</h1>

        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title"><strong>Subject Information</strong></h5>
                <p><strong>Subject Code:</strong> {{ $subject->code }}</p>
                <p><strong>Subject Name</strong> {{ $subject->name }}</p>
                <p><strong>Credit Hours:</strong> {{ $subject->creditHours }}</p>
            </div>
        </div>

        <h2>Subject Assessments</h2>
        @if ($subject->assessments->isEmpty())
            <p>This subject has no assessments yet.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Assessment Name</th>
                        <th>Assessment Type</th>
                        <th>Percentage</th>
                        <th>Remarks</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subject->assessments as $assessment)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $assessment->name }}</td>
                            <td>{{ $assessment->type }}</td>
                            <td>{{ $assessment->percentage }}</td>
                            <td>{{ $assessment->remarks }}</td>
                            <td>
                                <form action="{{ route('subjects.removeAssessment', [$subject, $assessment]) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove this assessment?');">
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


        <a href="{{ route('subjects.index') }}" class="btn btn-secondary mt-3">Back to Subject</a>
    </div>
</body>

</html>
@endsection