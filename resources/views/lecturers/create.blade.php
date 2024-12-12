@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecturer - Create</title>
</head>
<body>
    <div class="container">
    <h1>Lecturer - Create</h1>
        <form method="POST" action= "{{route('lecturers.store')}}">
            @csrf
            <div class="form-group">
                <label>Lecturer Name</label>
                <input type="text" class="form-control" placeholder="Enter lecturer name" name="name">
            </div>
            <div class="form-group">
                <label>Staff Number</label>
                <input type="text" class="form-control" placeholder="Enter lecturer number" name="staffNo">
            </div>
            <div class="form-group">
                <label>Lecturer email</label>
                <input type="email" class="form-control" placeholder="Enter lecturer email" name="email">
            </div>
            {{--comment--}}
            {{--div class="form-group">
                <label>Lecturer:</label>
                <select name="lecturer_id" required>
                    @foreach($lecturers as $lecturer)
                        <option value="{{$lecturer->id}}">{{$lecturer->name}}</option>
                    @endforeach
                </select>
            </div>--}}
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</body>
</html>
@endsection