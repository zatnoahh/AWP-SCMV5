@extends('layouts.app')
@section('content')
<body>
    <div class="container">
    <h1>Subject - List</h1>
    <button type="button" class="btn btn-outline-primary"><a href="{{ route('subjects.create') }}">Add New Subjects</a></button>
    <table class="table" border="1">
        <tr>
            <th>No.</th>
            <th>Code</th>
            <th>Name</th>
            <th>Credit Hours</th>
            <th>Action</th>
        </tr>
        @if ($subjects -> count() > 0)
        <?php $no = 1; ?>
            @foreach ($subjects as $subject)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $subject -> code }}</td>
                    <td>{{ $subject -> name }}</td>
                    <td>{{ $subject -> creditHours }}</td>
                    <td>
                        <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-primary" href="{{route('subjects.show', $subject->id)}}">Show</a>
                            <a class="btn btn-primary" href="{{route('subjects.edit', $subject->id)}}">Edit</a>
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