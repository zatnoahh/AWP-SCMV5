@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student - Create</title>
</head>
<body>
    <div class="container">
    <h1>Student - Create</h1>
        <form method="POST" action= "{{route('students.store')}}">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter name" name="name">
            </div>
            <div class="form-group">
                <label>Student ID</label>
                <input type="text" class="form-control" placeholder="Enter ID" name="studentNo">
            </div>
            <div class="form-group">
                <label>Email address</label>
                <input type="email" class="form-control" placeholder="Enter email" name="email">
            </div>
            {{--comment--}}
            {{--div class="form-group">
                <label>Subject:</label>
                <select name="subject_id" required>
                    @foreach($subjects as $subject)
                        <option value="{{$subject->id}}">{{$subject->name}}</option>
                    @endforeach
                </select>
            </div>--}}
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</body>
</html>
@endsection