@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found</title>
</head>
<body>
    <div class="container">
        <h1>404 - Page Not Found</h1>
        <p>Oops! The page you are looking for doesn't exist or has been moved.</p>
        <a href="{{ url('/') }}">Return to Home</a>
    </div>
</body>
</html>
@endsection
