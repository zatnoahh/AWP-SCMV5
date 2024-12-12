@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assessment - Index</title>
</head>
<body>
    <div class="container">
    <h1>Assessment - List</h1>
    <button type="button" class="btn btn-outline-primary"><a href="{{ route('assessments.create') }}">Add New Students</a></button>
    <table class="table" border="1">
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Type</th>
            <th>Percentage</th>
            <th>Subject</th>
            <th>Remarks</th>
            <th>Action</th>
        </tr>
        @if ($assessments -> count() > 0)
        <?php $no = 1; ?>
            @foreach ($assessments as $assessment)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $assessment -> name }}</td>
                    <td>{{ $assessment -> type }}</td>
                    <td>{{ $assessment -> percentage }}</td>
                    <td>{{ optional($assessment->subject)->name }}</td>
                    <td>{{ $assessment -> remarks }}</td>
                    <td>
                    <form action="{{ route('assessments.destroy', $assessment->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-primary" href="{{route('assessments.show', $assessment->id)}}">Show</a>
                        <a class="btn btn-primary" href="{{route('assessments.edit', $assessment->id)}}">Edit</a>                        
                        <input class="btn btn-danger" type="submit" value="Delete">                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5">No data found</td>
            </tr>
        @endif

    </table>
    </div>
</body>
</html>
@endsection