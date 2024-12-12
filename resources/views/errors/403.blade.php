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
        <h1>403 - Page not Authorize</h1>
        <p>Oops! The page you are looking for dont have authorization.</p>
        <a href="{{ url('/') }}">Return to Home</a>
    </div>
</body>
</html>
@endsection
