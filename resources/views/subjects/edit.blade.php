@extends('layouts.app')
@section('content')
<div class="container">
        <h1>Subjects - Edit</h1>
        <form method="POST" action="{{ route('subjects.update', $subject->id) }}">
            @method('PUT')
            <!--Prevention for phishing-->
            @csrf 
            <div class="form-group">
                <label>Subject Code</label>
                <input type="text" class="form-control" placeholder="Enter subject id" name="code" value="{{ $subject->code }}">
            </div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{ $subject->name }}">
            </div>
            <div class="form-group">
                <label>Credit Hours</label>
                <input type="integer" class="form-control" placeholder="Enter credit hours" name="creditHours" value="{{ $subject->creditHours }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <a href="{{ route('subjects.index') }}" class="btn btn-secondary mt-3">Back to Subjects</a>

    </div>
@endsection