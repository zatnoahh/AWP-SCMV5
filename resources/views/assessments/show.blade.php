@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assessment - Show</title>
</head>
<body>
<div class="container">
        <h1>Assessment Details</h1>

        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $assessment->name }}</h5>
                <p><strong>Student ID:</strong> {{ $assessment->type }}</p>
                <p><strong>Percentage (%):</strong> {{ $assessment->percentage }}</p>
                <p><strong>Subject:</strong> {{ optional($assessment->subject)->name }}</p>
                <p><strong>Remarks:</strong> {{ $assessment->remarks }}</p>
            </div>
        </div>

        <a href="{{ route('assessments.index') }}" class="btn btn-secondary mt-3">Back to Assessment</a>
    </div>
</body>

</html>
@endsection