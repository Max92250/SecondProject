<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
@if (session('login_status'))
<div class="alert alert-success">
    {{ session('login_status') }}
</div>
@endif
    <h2>Welcome, {{ $username }}!</h2>
    <form action="{{ route('logout') }}" method="get">
        @csrf
        <button type="submit">Logout</button>
    </form>
    <p>home</p>
</body>
</html>