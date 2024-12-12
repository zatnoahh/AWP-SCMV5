@extends('layouts.app')
@section('content')
<div class="container">
        <h1>Lecturers - Edit</h1>
        <form method="POST" action="{{ route('lecturers.update', $lecturer->id) }}">
            @method('PUT')
            <!--Prevention for phishing-->
            @csrf 
            <div class="form-group">
                <label>Lecturer Name</label>
                <input type="text" class="form-control" placeholder="Enter lecturer name" name="name" value="{{ $lecturer->name }}">
            </div>
            <div class="form-group">
                <label>Staff Number</label>
                <input type="text" class="form-control" placeholder="Enter lecturer number" name="staffNo" value="{{ $lecturer->staffNo }}">
            </div>
            <div class="form-group">
                <label>Lecturer email</label>
                <input type="email" class="form-control" placeholder="Enter lecturer email" name="email" value="{{ $lecturer->email }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <a href="{{ route('lecturers.index') }}" class="btn btn-secondary mt-3">Back to Lecturers</a>

    </div>
@endsection