@extends('layouts.app')
@section('content')
<body>
    <div class="container">
    <h1>Lecturer - List</h1>
    <button type="button" class="btn btn-outline-primary"><a href="{{ route('lecturers.create') }}">Add New Lecturers</a></button>
    <table class="table" border="1">
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Staff Number</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        @if ($lecturers -> count() > 0)
        <?php $no = 1; ?>
            @foreach ($lecturers as $lecturer)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $lecturer -> name }}</td>
                    <td>{{ $lecturer -> staffNo }}</td>
                    <td>{{ $lecturer -> email }}</td>
                    <td>
                        <form action="{{ route('lecturers.destroy', $lecturer->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-primary" href="{{route('lecturers.show', $lecturer->id)}}">Show</a>
                            <a class="btn btn-primary" href="{{route('lecturers.edit', $lecturer->id)}}">Edit</a>
                            <input class="btn btn-danger" type="submit" value="Delete">
                        </form>
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
@endsection