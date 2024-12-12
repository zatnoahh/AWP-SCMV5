@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student - Index</title>
</head>
<body>
    <div class="container">
    <h1>Student - List</h1>
    <button type="button" class="btn btn-outline-primary"><a href="{{ route('students.create') }}">Add New Students</a></button>
    <table class="table" border="1">
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Student ID</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        @if ($students -> count() > 0)
        <?php $no = 1; ?>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $student -> name }}</td>
                    <td>{{ $student -> studentNo }}</td>
                    <td>{{ $student -> email }}</td>
                    <td>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-primary" href="{{route('students.show', $student->id)}}">Show</a>
                        <a class="btn btn-primary" href="{{route('students.edit', $student->id)}}">Edit</a>                        
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